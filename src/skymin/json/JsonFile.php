<?php

declare(strict_types = 1);

namespace skymin\json;

use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function json_encode;
use function json_decode;
use const JSON_PRETTY_PRINT;
use const JSON_UNESCAPED_UNICODE;

final class JsonFile{

	public function __construct(
		private string $fileName,
		public array|JsonObject &$data
	){
		if(file_exists($this->fileName)){
			$decode = json_decode(file_get_contents($this->fileName), true);
			$this->data = $this->data instanceof JsonObject ? $this->data::jsonDeserialize($decode) : $decode;
		}
	}

	public function save() :void{
		file_put_contents($this->fileName, json_encode($this->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}
}
