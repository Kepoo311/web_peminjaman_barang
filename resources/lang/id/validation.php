<?php

return [
    'accepted'             => 'Isian :attribute harus diterima.',
    'active_url'           => 'Isian :attribute bukan URL yang valid.',
    'after'                => 'Isian :attribute harus berupa tanggal setelah :date.',
    'after_or_equal'       => 'Isian :attribute harus berupa tanggal setelah atau sama dengan :date.',
    'alpha'                => 'Isian :attribute hanya boleh berisi huruf.',
    'alpha_dash'           => 'Isian :attribute hanya boleh berisi huruf, angka, dan strip.',
    'alpha_num'            => 'Isian :attribute hanya boleh berisi huruf dan angka.',
    'array'                => 'Isian :attribute harus berupa sebuah array.',
    'before'               => 'Isian :attribute harus berupa tanggal sebelum :date.',
    'before_or_equal'      => 'Isian :attribute harus berupa tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => 'Isian :attribute harus antara :min dan :max.',
        'file'    => 'Isian :attribute harus antara :min dan :max kilobytes.',
        'string'  => 'Isian :attribute harus antara :min dan :max karakter.',
        'array'   => 'Isian :attribute harus antara :min dan :max item.',
    ],
    'boolean'              => 'Isian :attribute harus berupa true atau false.',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => 'Isian :attribute bukan tanggal yang valid.',
    'date_equals'          => 'Isian :attribute harus berupa tanggal yang sama dengan :date.',
    'date_format'          => 'Isian :attribute tidak cocok dengan format :format.',
    'different'            => 'Isian :attribute dan :other harus berbeda.',
    'digits'               => 'Isian :attribute harus berupa :digits digit.',
    'digits_between'       => 'Isian :attribute harus antara :min dan :max digit.',
    'dimensions'           => 'Isian :attribute memiliki dimensi gambar yang tidak valid.',
    'distinct'             => 'Isian :attribute memiliki nilai yang duplikat.',
    'email'                => 'Isian :attribute harus berupa alamat email yang valid.',
    'ends_with'            => 'Isian :attribute harus diakhiri dengan salah satu dari berikut: :values.',
    'exists'               => 'Isian :attribute yang dipilih tidak valid.',
    'file'                 => 'Isian :attribute harus berupa sebuah berkas.',
    'filled'               => 'Isian :attribute wajib diisi.',
    'gt'                   => [
        'numeric' => 'Isian :attribute harus lebih besar dari :value.',
        'file'    => 'Isian :attribute harus lebih besar dari :value kilobytes.',
        'string'  => 'Isian :attribute harus lebih besar dari :value karakter.',
        'array'   => 'Isian :attribute harus memiliki lebih dari :value item.',
    ],
    'gte'                  => [
        'numeric' => 'Isian :attribute harus lebih besar atau sama dengan :value.',
        'file'    => 'Isian :attribute harus lebih besar atau sama dengan :value kilobytes.',
        'string'  => 'Isian :attribute harus lebih besar atau sama dengan :value karakter.',
        'array'   => 'Isian :attribute harus memiliki :value item atau lebih.',
    ],
    'image'                => 'Isian :attribute harus berupa gambar.',
    'in'                   => 'Isian :attribute yang dipilih tidak valid.',
    'in_array'             => 'Isian :attribute tidak terdapat dalam :other.',
    'integer'              => 'Isian :attribute harus berupa bilangan bulat.',
    'ip'                   => 'Isian :attribute harus berupa alamat IP yang valid.',
    'ipv4'                 => 'Isian :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6'                 => 'Isian :attribute harus berupa alamat IPv6 yang valid.',
    'json'                 => 'Isian :attribute harus berupa JSON string yang valid.',
    'lt'                   => [
        'numeric' => 'Isian :attribute harus kurang dari :value.',
        'file'    => 'Isian :attribute harus kurang dari :value kilobytes.',
        'string'  => 'Isian :attribute harus kurang dari :value karakter.',
        'array'   => 'Isian :attribute harus memiliki kurang dari :value item.',
    ],
    'lte'                  => [
        'numeric' => 'Isian :attribute harus kurang dari atau sama dengan :value.',
        'file'    => 'Isian :attribute harus kurang dari atau sama dengan :value kilobytes.',
        'string'  => 'Isian :attribute harus kurang dari atau sama dengan :value karakter.',
        'array'   => 'Isian :attribute tidak boleh lebih dari :value item.',
    ],
    'max'                  => [
        'numeric' => 'Isian :attribute seharusnya tidak lebih dari :max.',
        'file'    => 'Isian :attribute seharusnya tidak lebih dari :max kilobytes.',
        'string'  => 'Isian :attribute seharusnya tidak lebih dari :max karakter.',
        'array'   => 'Isian :attribute seharusnya tidak lebih dari :max item.',
    ],
    'mimes'                => 'Isian :attribute harus dokumen berjenis: :values.',
    'mimetypes'            => 'Isian :attribute harus dokumen berjenis: :values.',
    'min'                  => [
        'numeric' => 'Isian :attribute harus minimal :min.',
        'file'    => 'Isian :attribute harus minimal :min kilobytes.',
        'string'  => 'Isian :attribute harus minimal :min karakter.',
        'array'   => 'Isian :attribute harus minimal :min item.',
    ],
    'not_in'               => 'Isian :attribute yang dipilih tidak valid.',
    'not_regex'            => 'Format isian :attribute tidak valid.',
    'numeric'              => 'Isian :attribute harus berupa angka.',
    'password'             => 'Kata sandi salah.',
    'present'              => 'Isian :attribute wajib ada.',
    'regex'                => 'Format isian :attribute tidak valid.',
    'required'             => 'Isian :attribute wajib diisi.',
    'required_if'          => 'Isian :attribute wajib diisi bila :other adalah :value.',
    'required_unless'      => 'Isian :attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => 'Isian :attribute wajib diisi bila terdapat :values.',
    'required_with_all'    => 'Isian :attribute wajib diisi bila terdapat :values.',
    'required_without'     => 'Isian :attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => 'Isian :attribute wajib diisi bila tidak terdapat salah satu dari :values.',
    'same'                 => 'Isian :attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Isian :attribute harus berukuran :size.',
        'file'    => 'Isian :attribute harus berukuran :size kilobytes.',
        'string'  => 'Isian :attribute harus berukuran :size karakter.',
        'array'   => 'Isian :attribute harus mengandung :size item.',
    ],
    'starts_with'          => 'Isian :attribute harus diawali dengan salah satu dari berikut: :values.',
    'string'               => 'Isian :attribute harus berupa string.',
    'timezone'             => 'Isian :attribute harus berupa zona waktu yang valid.',
    'unique'               => 'Isian :attribute sudah ada sebelumnya.',
    'uploaded'             => 'Isian :attribute gagal diunggah.',
    'url'                  => 'Format isian :attribute tidak valid.',
    'uuid'                 => 'Isian :attribute harus berupa UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Baris Bahasa Kustom untuk Validasi
    |--------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi kustom untuk atribut menggunakan
    | konvensi "attribute.rule" untuk memberi nama baris. Ini membuatnya cepat untuk
    | menentukan baris bahasa kustom untuk aturan atribut tertentu.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Atribut Kustom Validasi
    |--------------------------------------------------------------------------
    |
    | Baris bahasa berikut digunakan untuk mengganti tempat penampung atribut
    | dengan sesuatu yang lebih ramah pembaca seperti "Alamat Email" sebagai ganti dari
    | "email". Ini benar-benar membantu kita membuat pesan lebih jelas.
    |
    */

    'attributes' => [],

];
