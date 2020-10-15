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
RajaOngkir::province();

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
RajaOngkir::province($id);

callback
  0 => array:2 [▼
    "province_id" => "1"
    "province" => "Bali"
  ]
```

### KOTA
#### Untuk mengambil data kota tanpa Id
```sh
RajaOngkir::city()

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
RajaOngkir::city($id)

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
RajaOngkir::city_by_province($province_id)

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
RajaOngkir::shipping($origin, $destination, $weight, $courier);

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




## Release History

* V 1.0 
    * Upload fitur dasar, ambil data kota, provinsi, ongkos kirim.




