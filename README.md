
# Website peminjaman barang

Website yang di gunakan untuk peminjaman barang, yang di lengkapi export ke template docx, dan excel.


## Features

- Mengisi form
- Membuat laporan ke excel
- Membuat surat ke docx
- Reponsive


## Tech Stack

**Client:** Laravel 11, Javascript, TailwindCSS

**Server:** PHP, Sqlite


## Installation

Clone project ini

```bash
  git clone 
  cd web_peminjaman_barang
```

Install dependencies

```bash
  composer install
  npm install
```

Configurasi DB

```bash
  php artisan migrate:fresh --seed
```

Mengatur template docs di SuratController

Menjalankan project

 ```bash
  php artisan serve
  npm run dev  // untuk tailwind
```   
## Authors

- [@Kepoo311](https://www.github.com/kepoo311)

