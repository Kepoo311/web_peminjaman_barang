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
    <link rel="stylesheet" href="{{asset('css/build.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- @vite('resources/css/app.css') --}}
    <title>Peminjaman Barang</title>
</head>

<body>
    <section class="min-h-screen w-full">
        @include('components.nav')
        <section class="h-dvh grid grid-cols-1 md:grid-cols-2 justify-items-center content-center px-10">
            <div class="md:order-2">
                <img class="h-60" src="{{ asset('asset/undraw_delivery_truck_vt6p.svg') }}" alt="Rent svg">
            </div>
            <div class="md:order-1">
                
                <p class="text-2xl md:text-6xl font-bold font-nunito flex"><span id="typed"></span></p>
                <p class="text-sm md:text-lg font-poppins font-semibold text-gray-700 mb-4">Selamat datang di website
                    peminjaman barang!</p>
                <a href="/form"
                    class="bg-blue-400 p-2 text-white rounded-md font-semibold font-nunito hover:bg-blue-500 duration-500 hover:shadow-2xl hover:shadow-blue-500">Pinjam
                    Sekarang</a>
            </div>
        </section>
        @include('components.footer')
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var typed = new Typed('#typed', {
            strings: ['Peminjaman Barang', 'Mau Pinjam Mobil?', 'Mau Pinjam Motor?', 'Mau Pinjam LCD?', 'Mau Pinjam Video Tron?', 'Dan yang lainnya?','Tinggal isi form!'],
            smartBackspace: true, // Default value
            typeSpeed: 50,
            backSpeed: 25,
            loop:true
        });

        let succ = {{ session()->has('succ') ? 1 : 0 }}
        let succMsg = @json(session('succ'))

        let error = {{ session()->has('error') ? 1 : 0 }}
        let errorMsg = @json(session('error'))

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
        if (error) {
            Toast.fire({
                icon: 'error',
                title: errorMsg,
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
