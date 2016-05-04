<?php
/**
 *
 * Copyright (C) 4/5/2016 (dd-mm-yyyy).
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 *
 */

namespace Mainpixel\Api;
use GuzzleHttp;

class MainpixelApi {

	private $mode;
	private $response;
	private $methodname;
	private $identifier;

	protected $parentName = 'Mainpixel\Api\WefactApi';

	public function __construct(){
		if (!isset($this->mode)) {
			$function_call = explode('\\', strtolower(get_class($this)));
			$this->mode = last($function_call);
		}
	}

	public function __call($method, $arguments){

		// Rename functions from inhented instances from method to _method for internal use.
		if (get_class($this) != $this->parentName) {
			if (in_array($method, $this->allowed)) {
				$this->methodname = '_' . $method;
				if (method_exists($this, $this->methodname)) {
					if(count($arguments) == 2){
						$this->identifier = $arguments[0];
						$arguments = [$arguments[1]];
					}
					return call_user_func_array([$this, $this->methodname], $arguments);
				}
			} else {
				return get_class($this);
			}
		}
	}

	protected function _list(array $input){
		return $this->pseudoRequest('GET', $input);
	}
	protected function _edit(array $input){
		return $this->pseudoRequest('GET', $input);
	}

	protected function pseudoRequest($request, array $input){
		return $this->sendRequest($this->mode, $request, $input);
	}

	protected function sendRequest($controller, $request, $params){
		$client = new GuzzleHttp\Client();

		$headers = [
			'token' => 'fsdfsdfsdfdsfsdfsdfdsf',
			'profile' => 'fsdfsdfsdfdsfsdfsdfdsf',
		];

        if(strlen($this->identifier)>0){
			$headers['identifier'] = $this->identifier;
		}

		$res = $client->request(strtoupper($request), config('mainpixel.url') . $controller, [
			'headers' => $headers,
			'json' => $params,
		]);

		return $res->getBody();
	}


}