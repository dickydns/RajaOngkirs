Install composer 
composer require dickyp/rajaongkir

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
