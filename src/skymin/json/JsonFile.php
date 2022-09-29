<?php
/*
*       _                       _        
*      | |                     (_)       
*  ___ | | __ _   _  _ __ ___   _  _ __  
* / __|| |/ /| | | || '_ ` _ \ | || '_ \ 
* \__ \|   < | |_| || | | | | || || | | |
* |___/|_|\_\ \__, ||_| |_| |_||_||_| |_|
*              __/ |                     
*             |___/                      
* 
* This program is free software: you can redistribute it and/or modify
* it under the terms of the MIT License. see <https://opensource.org/licenses/MIT>.
*/

declare(strict_types = 1);

namespace skymin\json;

use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function json_encode;
use function json_decode;
use const JSON_PRETTY_PRINT;
use const JSON_UNESCAPED_UNICODE;

final class Data{

	private function __construct(){
		//NOOP
	}

	public static function call(string $path, array $default = []) : array{
		return file_exists($path) ? json_decode(file_get_contents($path), true) : $default;
	}
	
	public function save(string $path, array $data) :void{
		file_put_contents($path . '.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}
	
}
