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
		$url 	= $this->endpoint."".$path;
		$curl 	= curl_init();

		$default = array(
			CURLOPT_URL 			=> $url,
			CURLOPT_RETURNTRANSFER  => true,
			CURLOPT_ENCODING 		=> "",
			CURLOPT_MAXREDIRS 		=> 10,
			CURLOPT_TIMEOUT 		=> 30,
			CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST 	=> "GET",
			CURLOPT_HTTPHEADER 		=> array(
		    	"key:".$this->key
			)
		);

		// if ($options) {
 		//	$config = array_merge($default, $options);
		// } else{
		// 	$data = [
		// 		CURLOPT_URL 			=> $url,
		// 		CURLOPT_CUSTOMREQUEST 	=> "GET",
		// 		CURLOPT_HTTPHEADER 		=> array(
		// 	    	"key:".$this->key
		// 		)
		// 	];
		// 	$config = array_merge($default, $data);
		// }
		

		curl_setopt_array($curl, $default);

		$response = curl_exec($curl);
		$err 	  = curl_error($curl);
		curl_close($curl);
		$response_convert = json_decode($response,true);
		
		if ($err) {
			throw new Exception($err, 1);
		}
		
		if (!isset($response_convert['rajaongkir'])) {
			$this->error = 'Response not valid';
			//return false;
		}
		$rajaongkir = $response_convert['rajaongkir'];

		if ($response_convert['rajaongkir']['status']['code'] == 400 ) {
			return $this->error = $rajaongkir['status']['description'];
		}

		if ($response_convert['rajaongkir']['status']['code'] == 200 ) {
			$data 		 = $rajaongkir['results'];
			return $data;
		}
		// if ($err) {
		// 	echo "cURL Error #:" . $err;
		// } else {
		// 	$response = json_decode($response,true);
		// 	$data 	  = $response['rajaongkir']['results'];
		// 	return $data;
		// }
		
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


	public function cost_shipping($origin, $destination, $weight, $courier){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL 			 => $this->endpoint."/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING 		 => "",
		  CURLOPT_MAXREDIRS 	 => 10,
		  CURLOPT_TIMEOUT 		 => 30,
		  CURLOPT_HTTP_VERSION 	 => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST  => "POST",
		  CURLOPT_POSTFIELDS 	 => "origin=".$origin."&destination=".$destination."&weight=".$weight."&courier=".$courier,
		  CURLOPT_HTTPHEADER 	 => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key:".$this->key
		  ),
		));

		$response = curl_exec($curl);
		$err 	  = curl_error($curl);
		$response_convert = json_decode($response,true);
		
		curl_close($curl);
		if ($err) {
			throw new Exception($err, 1);
		}
		
		if (!isset($response_convert['rajaongkir'])) {
			$this->error = 'Response not valid';
			return false;
		}

		$rajaongkir = $response_convert['rajaongkir'];

		if ($response_convert['rajaongkir']['status']['code'] == 400 ) {
			$this->error = $rajaongkir['status']['description'];
		}

		if ($response_convert['rajaongkir']['status']['code'] == 200 ) {
			$data 		 = $rajaongkir['results'];
			return $data;
		}

		// if ($err) {
		// 	echo "cURL Error #:" . $err;
		// } else {
		// 	$response = json_decode($response,true);
		// 	$data 	  = $response['rajaongkir']['results'];
		// 	return $data;
		// 	dd($response);
		// }

		// $new_addon_options = [
		// 	CURLOPT_URL 			=> $this->endpoint."/cost",
		// 	CURLOPT_CUSTOMREQUEST   => "POST",
		// 	CURLOPT_POSTFIELDS 		=> "origin=".$origin."&destination=".$destination."&weight=".$weight."&courier=".$courier,
		// 	CURLOPT_HTTPHEADER 		=> array(
		// 		"content-type: application/x-www-form-urlencoded",
		//     	"key:".$this->key
		// 	),
		// ];
		// return self::_request('/cost', $new_addon_options);
	}
}