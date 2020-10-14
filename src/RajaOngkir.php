<?php
namespace Dickyp\RajaOngkir;

class RajaOngkir{
	protected $endpoint;
	protected $key;
	private   $error;

	public function __construct(){
		$this->endpoint = config('rajaongkir.end_point');
		$this->key 		= config('rajaongkir.token');
	}

	private function _request($path, $options = null){
		$url 	= $this->endpoint . "" . $path;
		$curl 	= curl_init();

		$config = array(
			CURLOPT_URL 			=> $url,
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
		if ($options == null) {
			$config = $config;
		} else{
			$config = array_merge($config, $options);
		}
		
		curl_setopt_array($curl, $config);

		$response = curl_exec($curl);
		$err 	  = curl_error($curl);
		curl_close($curl);
		
		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$response = json_decode($response,true);
			$data 	  = $response['rajaongkir']['results'];
			return $data;
		}
		
	}

	public function get_city($id = null){
		if ($id == null) {
			return self::_request('/city');
		} else{
			return self::_request('/city?id='.$id);
		}
		return null;
	}

	public function get_province($id = null){
		if ($id == null) {
			return self::_request('/province');
		} else{
			return self::_request('/province?id='.$id);
		}

		return null;
	}

	public function get_city_using_province_id($id = null){
		if ($id == null) {
			return self::_request('/city');
		} else{
			return self::_request('/city?province='.$id);
		}
		return null;
	}


	public function cost_shipping($origin, $destination, $weight, $courier)
	{
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