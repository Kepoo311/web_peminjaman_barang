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
        <link rel="icon" type="image/x-icon" href="{{asset('asset/KP.png')}}">
    <link rel="stylesheet" href="{{asset('css/build.css')}}">
    {{-- @vite('resources/css/app.css') --}}
    <title>Dashboard</title>
</head>

<body>
    <section>
        @include('components.nav')

        <div class="p-5 mt-20">

            <div class="mb-5">
                <a href="/admin/tambah-barang"
                    class="bg-blue-500 hover:bg-blue-600 duration-500 rounded-md p-2 shadow-md text-white font-bold">Tambah
                    barang</a>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Barang
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kode Barang
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataBarang as $item)
                            <tr class="odd:bg-white even:bg-gray-50 border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $item->nama_barang }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->kode_barang }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">
                                    <a href="/admin/edit-barang?id_barang={{ $item->id }}"
                                        class="bg-blue-500 hover:bg-blue-600 duration-500 rounded-md p-2 shadow-md text-white font-bold">Edit</a>
                                    <a href="/admin/hapus-barang?id_barang={{ $item->id }}" onclick="return confirm('Yakin mau delete?')"
                                        class="bg-blue-500 hover:bg-blue-600 duration-500 rounded-md p-2 shadow-md text-white font-bold">Hapus</a>
                                    </div>
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
            {{ $dataBarang->links() }}
        </div>
    </section>

    <section class="flex justify-end items-end w-full pb-5">
        <form action="/export-barang-excel" method="POST">
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
