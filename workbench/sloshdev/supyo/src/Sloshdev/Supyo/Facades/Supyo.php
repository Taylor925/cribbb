<?php namespace Sloshdev\Supyo\Facades;

use Illuminate\Support\Facades\Facade;

class Supyo extends Facade {
	
	protected static function getFacadeAccessor() { return 'supyo'; }
}