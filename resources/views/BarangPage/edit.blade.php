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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/build.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="{{asset('asset/KP.png')}}">
    {{-- @vite('resources/css/app.css') --}}
    <title>Edit barang</title>
</head>

<body>
    <section class="flex flex-col w-full h-full">
        @include('components.nav')

        <section class="bg-white shadow-lg border md:w-[50rem] h-fit self-center mt-32 mb-5 rounded-lg">
            <div class="w-full mt-3">
                <h1 class="text-center font-bold font-nunito text-4xl">Edit Barang</h1>
            </div>
            <div class="w-full px-5 pt-10">
                <form id="form_pinjam" action="/admin/edit-barang" method="POST">
                    @csrf
                    <input type="hidden" name="id_barang" value="{{$data->id}}">
                    <div class="mb-3">
                        <label for="nama_barang" class="block mb-2 text-sm font-medium text-gray-900">Nama barang</label>
                        <input type="text" id="nama_barang" name="nama_barang" placeholder="Nama barang anda.."
                            value="{{ $data->nama_barang }}" autocomplete="off"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('nama_barang')
                            <p class="text-md font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kode_barang" class="block mb-2 text-sm font-medium text-gray-900">Kode barang</label>
                        <input type="text" id="kode_barang" name="kode_barang" placeholder="Kode barang anda.." autocomplete="off"
                            value="{{ $data->kode_barang }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('kode_barang')
                            <p class="text-md font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <button id="submitButton" type="submit"
                        class="bg-blue-500 rounded-lg hover:bg-blue-600 duration-500 shadow-md text-white font-bold font-poppins text-lg p-2 w-full mt-3">Kirim</button>
                    <p class="text-lg text-center font-bold text-red-500 font-poppins mt-5">Mohon isi form dengan
                        benar.
                    </p>
                </form>
            </div>
        </section>

        @include('components.footer')
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('form_pinjam');
            const submitButton = document.getElementById('submitButton');
        
            form.addEventListener('submit', function (e) {
                submitButton.disabled = true;
                submitButton.textContent = 'Loading...';
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
