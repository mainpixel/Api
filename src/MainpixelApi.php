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
				// No function found or allowed to open.
				abort('404', 'This function is not found or allowed.');
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
		// 1.1 Init Guzzle.
		$client = new GuzzleHttp\Client();
		// 1.2 Do a request into given URL.
		$res = $client->request(strtoupper($request), config('mainpixel.url') . $controller, [
			'headers' => [
				'token' => '572b33a5c41f31c66c8b4579',
				'identifier' => $this->identifier,
			],
			'json' => $params,
		]);
		return $res->getBody();
	}
}