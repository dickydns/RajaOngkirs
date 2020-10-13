<?php

namespace Dickyp\RajaOngkir;

use Illuminate\Support\Facades\Facade;

class RajaOngkirFacade extends Facade{
	protected static function getFacadeAccessor() { return 'rajaongkir'; }
}