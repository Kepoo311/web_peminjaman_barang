<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Autour+One&family=Montserrat:wght@300&family=Nunito&family=Poppins:ital,wght@0,200;1,300&family=Quicksand&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/build.css')}}">
    {{-- @vite('resources/css/app.css') --}}
    <title>Dashboard</title>
</head>

<body>
    <section>
        @include('components.nav')

        <div class="p-5 mt-20">
            
            <form method="POST" action="/admin" class="max-w-md mb-3">
                @csrf
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search" name="search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search nama peminjam..." required />
                    <div class="absolute inset-y-0 end-0 flex items-center">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                        <a href="/admin"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 mx-2">Show all</a>
                    </div>
                </div>
            </form>
            

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Foto peminjam
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No telpon
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Barang
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah unit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal pinjam
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPinjam as $item)
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <img class="w-20 h-20" src="{{asset('foto_peminjam/'.$item->foto_peminjam)}}" alt="$item->foto_peminjam">
                            </th>
                            <td class="px-6 py-4">
                                {{$item->nama}}
                            </td>
                            <td class="px-6 py-4">
                                {{$item->no_telpon}}
                            </td>
                            <td class="px-6 py-4">
                                {{$item->barang}}
                            </td>
                            <td class="px-6 py-4">
                                {{$item->jmlh_unit}}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}
                            </td>
                            <td class="px-6 py-4">
                                <form class="flex gap-3" method="POST" action="/unduh">
                                @csrf
                                <input type="hidden" name="id_data" value="{{$item->id}}">
                                <button
                                    type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 duration-500 rounded-md p-2 shadow-md text-white font-bold">Unduh
                                    surat</button>
                                
                                <a href="/admin/hapus-peminjam?id_barang={{ $item->id }}" onclick="return confirm('Yakin mau delete?')"
                                        class="bg-blue-500 hover:bg-blue-600 duration-500 rounded-md p-2 shadow-md text-white font-bold">Hapus</a>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center">No data available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{$dataPinjam->links()}}
        </div>
    </section>

    <section class="flex justify-end items-end w-full">
        <form action="/export-excel" method="POST">
        @csrf
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-600 duration-500 rounded-md p-2 shadow-md text-white font-bold mx-5">Unduh
            data excel</button>
        </form>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let succ = {{ session()->has('succ') ? 1 : 0 }}
        let succMsg = @json(session('succ'))

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
        });

        if (succ) {
            Toast.fire({
                icon: 'info',
                title: succMsg,
            })
        }
    </script>

    <style>
        .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }
    </style>
</body>

</html>
