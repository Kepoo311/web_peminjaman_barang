<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('asset/KP.png')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Autour+One&family=Montserrat:wght@300&family=Nunito&family=Poppins:ital,wght@0,200;1,300&family=Quicksand&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/build.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('aos/aos.css') }}">
    {{-- @vite('resources/css/app.css') --}}
    <title>Form Pinjam</title>
</head>

<body>
    <section class="flex flex-col w-full h-full">
        @include('components.nav')

        <section data-aos="fade-down" data-aos-duration="500" class="bg-white shadow-lg border md:w-[50rem] h-fit self-center mt-20 mb-5 rounded-lg">
            <div class="w-full mt-3">
                <h1 class="text-center font-bold font-nunito text-4xl">Form Peminjaman</h1>
            </div>
            <div class="w-full px-5 pt-10">
                <form id="form_pinjam" action="/post/form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="Nama anda.."
                            value="{{ old('nama') }}" autocomplete="off"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('nama')
                            <p class="text-md font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="foto_peminjam">Upload foto
                            peminjam + barang</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            aria-describedby="foto_peminjam_help" id="foto_peminjam" type="file"
                            name="foto_peminjam">
                        <p class="mt-1 text-sm text-gray-500" id="foto_peminjam_help">PNG,JPG,JPEG</p>
                        @error('foto_peminjam')
                            <p class="text-md font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="no_telpon" class="block mb-2 text-sm font-medium text-gray-900">No telpon</label>
                        <input type="text" id="no_telpon" name="no_telpon" placeholder="Ex. 089********" autocomplete="off"
                            value="{{ old('no_telpon') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('no_telpon')
                            <p class="text-md font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" placeholder="Jabatan anda..." autocomplete="off"
                            value="{{ old('jabatan') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('jabatan')
                            <p class="text-md font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="barang" class="block mb-2 text-sm font-medium text-gray-900">Pinjam barang</label>
                        <select id="barang" name="barang"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option>Pilih barang</option>
                            @foreach ($dataBarang as $item)
                            <option value="{{$item->id}}" {{ old('barang') == $item->id ? 'selected' : '' }}>{{$item->nama_barang}}</option>
                            @endforeach
                            <option value="Lainnya" {{ old('barang') == 'Lainnya' ? 'selected' : '' }}>Lainnya..</option>
                        </select>
                        @error('barang')
                            <p class="text-md font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jmlh_unit" class="block mb-2 text-sm font-medium text-gray-900">Jumlah unit</label>
                        <input type="number" id="jmlh_unit" name="jmlh_unit" placeholder="1" autocomplete="off"
                            value="{{ old('jmlh_unit') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('jmlh_unit')
                            <p class="text-md font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="aksesoris" class="block mb-2 text-sm font-medium text-gray-900">Aksesoris
                            (optional)</label>
                        <input type="text" id="aksesoris" name="aksesoris" placeholder="Ex. Charger" autocomplete="off"
                            value="{{ old('aksesoris') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('aksesoris')
                            <p class="text-md font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="keperluan" class="block mb-2 text-sm font-medium text-gray-900">Keperluan</label>
                        <input type="text" id="keperluan" name="keperluan" placeholder="Ex. Pribadi" autocomplete="off"
                            value="{{ old('keperluan') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('keperluan')
                            <p class="text-md font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan
                            (optional)</label>
                        <input type="text" id="keterangan" name="keterangan" placeholder="Ex. Untuk....." autocomplete="off"
                            value="{{ old('keterangan') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('keterangan')
                            <p class="text-md font-bold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pengembalian" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                            pengambalian</label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker type="text" name="pengembalian" value="{{old('pengembalian')}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                placeholder="Select date" autocomplete="off">
                        </div>
                        @error('pengembalian')
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

    <script src="{{ asset('aos/aos.js') }}"></script>

    <script>
        AOS.init();

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
