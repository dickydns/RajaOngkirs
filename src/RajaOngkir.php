<?php
namespace Dickyp\RajaOngkir;

class RajaOngkir{
	protected $endpoint;
	protected $key;
	private   $error;

	public function __construct(){
		$this->city = json_decode(file_get_contents(__DIR__ . '/config/city_tmp.json'));
		$this->province = json_decode(file_get_contents(__DIR__ . '/config/province_tmp.json'));
		$this->endpoint = config('rajaongkir.end_point');
		$this->key 		= config('rajaongkir.token');
	}

	private function _request($path, $options = null){
		$url 	= $this->endpoint . "/" . $path;
		$curl 	= curl_init();
		$config = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER  => true,
			CURLOPT_ENCODING 		=> "",
			CURLOPT_MAXREDIRS 		=> 10,
			CURLOPT_TIMEOUT 		=> 30,
			CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST 	=> "GET",
			CURLOPT_HTTPHEADER 		=> array(
		    	"key:".$this->key
			),
		);
		$config = array_merge($config, $options);
		curl_setopt_array($curl, $config);

		$response = curl_exec($curl);
		$err 	  = curl_error($curl);
		curl_close($curl);

		if ($err) {
			throw new Exception($err, 1);
		}

		if (!isset($response->rajaongkir)) {
			$this->error = 'Response not valid';
			return false;
		}

		$rajaongkir = $response->rajaongkir;

		if ($rajaongkir->status->code == 400 ) {
			$this->error = $rajaongkir->status->description;
		}

		if ($rajaongkir->status->code == 200 ) {
			return $rajaongkir->results;
		}
	}

	public function get_city($id = null){
		if ($id == null) {
			return empty($this->city) ? self::_request('/city') : $this->city;
		}

		if (empty($this->city)) {
			return self::_request('/city?id='.$id);
		}

		foreach ($this->city as $key => $value) {
			if ($value->city_id == $id) {
				return $value;
			}
		}
		return null;
	}

	public function get_province($id = null){
		if ($id == null) {
			return empty($this->province) ? self::_request('/province') : $this->province;
		}

		if (empty($this->province)) {
			return self::_request('/province?id='.$id);
		}

		foreach ($this->province as $key => $value) {
			if ($value->province_id == $id) {
				return $value;
			}
		}
		return null;
	}

	public function cost_shipping($origin, $destination, $weight, $courier){
		$new_addon_options = [
			CURLOPT_CUSTOMREQUEST   => "POST",
			CURLOPT_POSTFIELDS 		=> "origin=".$origin."&destination=".$destination."&weight=".$weight."&courier=".$courier,
			CURLOPT_HTTPHEADER 		=> array(
				"content-type: application/x-www-form-urlencoded",
		    	"key:".self::key
			),
		];
		return self::_request('/cost', $new_addon_options);
	}
}