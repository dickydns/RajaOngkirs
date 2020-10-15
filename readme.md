# RAJAONGKIR API UNTUK LARAVEL 7  PNP BOSS
> API RAJAONGKIR PLUGIN.
silahkan lapor jika ada bug atau masukan



## Installation
Install dengan Composer

```sh
composer require dickyp/rajaongkir
```

### Tambahkan

#### Provider:
```sh
Dickyp\RajaOngkir\ROngkirPackageServiceProvider::class,
```

#### aliases:
```sh
'RajaOngkir' => Dickyp\RajaOngkir\RajaOngkirFacade::class
```
#### API TOKEN & Tipe akun

```sh
dalam folder laravel-project/config/config/rajaongkir.php

pindahkan rajaongkir.php ke folder laravel-project/config/ 

dalam file .env tambahkan 

RONGKIR_ENDPOINT=http://rajaongkir.com/api/starter
RONGKIR_KEY=API-TOKEN-ANDA
```



## Usage example
### PROVINSI
#### Untuk mengambil data provinsi tanpa Id
```sh
RajaOngkir::get_province();

callback
  0 => array:2 [▼
    "province_id" => "1"
    "province" => "Bali"
  ]
  1 => array:2 [▼
    "province_id" => "2"
    "province" => "Bangka Belitung"
  ]
```

#### Untuk mengambil data provinsi dengan Id
```sh
$id = 1;
RajaOngkir::get_province($id);

callback
  0 => array:2 [▼
    "province_id" => "1"
    "province" => "Bali"
  ]
```

### KOTA
#### Untuk mengambil data kota tanpa Id
```sh
RajaOngkir::get_city()

callback
  0 => array:6 [▼
    "city_id" => "1"
    "province_id" => "21"
    "province" => "Nanggroe Aceh Darussalam (NAD)"
    "type" => "Kabupaten"
    "city_name" => "Aceh Barat"
    "postal_code" => "23681"
  ]
```
#### Untuk mengambil data kota dengan Id

```sh
$id = 1;
RajaOngkir::get_city($id)

callback
  0 => array:6 [▼
    "city_id" => "1"
    "province_id" => "21"
    "province" => "Nanggroe Aceh Darussalam (NAD)"
    "type" => "Kabupaten"
    "city_name" => "Aceh Barat"
    "postal_code" => "23681"
  ]
```

#### Untuk mengambil data kota berdasarkan provinsi

```sh
$province_id = 1;
RajaOngkir::get_city_using_province_id($province_id)

callback
 0 => array:6 [▼
    "city_id" => "17"
    "province_id" => "1"
    "province" => "Bali"
    "type" => "Kabupaten"
    "city_name" => "Badung"
    "postal_code" => "80351"
  ]
```

#### Untuk menghitung biaya pengiriman

```sh
$origin      = $id_city_origin; // id kota pengirim
$destination = $id_city_destination; //id kota penerima
$weight      = 10000;   //dalam satuan gram
$courier     = "jne" bisa di isi kurir lain tergantung tipe akun.
RajaOngkir::cost_shipping($origin, $destination, $weight, $courier);

callback 

  "code" => "jne"
  "name" => "Jalur Nugraha Ekakurir (JNE)"
  "costs" => array:2 [▼
    0 => array:3 [▼
      "service" => "OKE"
      "description" => "Ongkos Kirim Ekonomis"
      "cost" => array:1 [▶]
    ]
    1 => array:3 [▼
      "service" => "REG"
      "description" => "Layanan Reguler"
      "cost" => array:1 [▶]
    ]
  ]
```


## Development setup

Describe how to install all development dependencies and how to run an automated test-suite of some kind. Potentially do this for multiple platforms.

```sh
make install
npm test
```

## Release History

* 0.2.1
    * CHANGE: Update docs (module code remains unchanged)
* 0.2.0
    * CHANGE: Remove `setDefaultXYZ()`
    * ADD: Add `init()`
* 0.1.1
    * FIX: Crash when calling `baz()` (Thanks @GenerousContributorName!)
* 0.1.0
    * The first proper release
    * CHANGE: Rename `foo()` to `bar()`
* 0.0.1
    * Work in progress

## Meta

Your Name – [@YourTwitter](https://twitter.com/dbader_org) – YourEmail@example.com

Distributed under the XYZ license. See ``LICENSE`` for more information.

[https://github.com/yourname/github-link](https://github.com/dbader/)

## Contributing

1. Fork it (<https://github.com/yourname/yourproject/fork>)
2. Create your feature branch (`git checkout -b feature/fooBar`)
3. Commit your changes (`git commit -am 'Add some fooBar'`)
4. Push to the branch (`git push origin feature/fooBar`)
5. Create a new Pull Request

<!-- Markdown link & img dfn's -->
[npm-image]: https://img.shields.io/npm/v/datadog-metrics.svg?style=flat-square
[npm-url]: https://npmjs.org/package/datadog-metrics
[npm-downloads]: https://img.shields.io/npm/dm/datadog-metrics.svg?style=flat-square
[travis-image]: https://img.shields.io/travis/dbader/node-datadog-metrics/master.svg?style=flat-square
[travis-url]: https://travis-ci.org/dbader/node-datadog-metrics
[wiki]: https://github.com/yourname/yourproject/wiki


