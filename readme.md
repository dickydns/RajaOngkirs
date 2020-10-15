# RAJAONGKIR API UNTUK LARAVEL 7  PNP BOSS
> API RAJAONGKIR PLUGIN.
silahkan lapor jika ada bug atau masukan



## Installation
Install dengan Composer

```sh
composer require dickyp/rajaongkir
```

### Tambahkan

Provider:
```sh
Dickyp\RajaOngkir\ROngkirPackageServiceProvider::class,
```

aliases:
```sh
'RajaOngkir' => Dickyp\RajaOngkir\RajaOngkirFacade::class
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









Install composer 
composer require dickyp/rajaongkir

config app tambahkan
Provider:
Dickyp\RajaOngkir\ROngkirPackageServiceProvider::class,

aliases:
'RajaOngkir' => Dickyp\RajaOngkir\RajaOngkirFacade::class

ambil data provinsi 

RajaOngkir::get_province();

Dengan Id 
RajaOngkir::get_province($id);

ambil data kota

RajaOngkir::get_city();

Dengan Id

RajaOngkir::get_city($id);


hitung biaya

RajaOngkir::cost_shipping($origin, $destination, $weight, $courier);

ambil kota berdasarkan provinsi

RajaOngkir::get_city_using_province_id($province_id)
