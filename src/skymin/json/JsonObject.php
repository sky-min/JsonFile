<?php

declare(strict_types=1);

namespace skymin\json;

interface JsonObject extends \JsonSerializable{

	public function jsonSerialize() : array;

	public static function jsonDeserialize(array $json) : self;
}