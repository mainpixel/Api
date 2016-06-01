<?php
/**
 * Mainpixel B.V.  - All Rights Reserved.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 *
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

namespace Mainpixel\Api;
use GuzzleHttp;
use GuzzleHttp\Exception\ClientException;

class MainpixelApi {

	private $mode;
	private $methodname;
	private $identifier;

	protected $parentName = 'Mainpixel\Api';

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

					return call_user_func_array([$this, $this->methodname], $arguments);
				}
			} else {
				// No function found or allowed to open.
				abort('404', 'This function is not found or allowed.');
			}
		}
	}
	protected function _list(array $input = []){
		return $this->pseudoRequest('GET', $input);
	}
	protected function _show(array $input = []){
		$this->path = $this->path . '/'.$input['identifier'];
		return $this->pseudoRequest('GET', $input);
	}
	protected function _remove(array $input = []){
		$this->path = $this->path . '/'.$input['identifier'];
		return $this->pseudoRequest('DELETE', []);
	}
	protected function _edit(array $input = []){
		return $this->pseudoRequest('PUT', $input);
	}
	protected function _add(array $input = []){
		return $this->pseudoRequest('POST', $input);
	}
	protected function pseudoRequest($request, array $input){
		return $this->sendRequest($this->mode, $request, $input);
	}
	protected function sendRequest($controller, $request, $params){
		// 1.1 Init Guzzle.
		$client = new GuzzleHttp\Client();
		$open = config('mainpixelApi.url') . $this->path;


		// 1.2 Do a request into given URL.
		try {

			$res = $client->request(strtoupper($request), (string)$open, [
				'headers' => [
					'token' => config('mainpixelApi.token'),
					//'identifier' => $this->identifier,
				],
				'query' => $params,
			]);
			return json_decode($res->getBody()->getContents(),true);

		} catch (\Exception $ex) {
			return $ex->getMessage();
			//dd($ex->getCode());
			\Log::error($ex);
		}

	}
}