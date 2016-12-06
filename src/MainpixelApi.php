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
use App;

class MainpixelApi {

    private $mode;
    private $methodname;
    private $identifier;

    protected $parentName = 'Mainpixel\Api';

    /**
     * MainpixelApi constructor.
     */
    public function __construct() {
        if ( !isset($this->mode) ) {
            $function_call = explode('\\', strtolower(get_class($this)));
            $this->mode = last($function_call);
        }
    }

    /**
     * @param $method
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($method, $arguments) {
        // Rename functions from inhented instances from method to _method for internal use.
        if ( get_class($this) != $this->parentName ) {
            if ( in_array($method, $this->allowed) ) {
                $this->methodname = '_' . $method;
                if ( method_exists($this, $this->methodname) ) {

                    return call_user_func_array([$this, $this->methodname], $arguments);
                }
            } else {
                // No function found or allowed to open.
                abort('404', 'This function is not found or allowed.');
            }
        }
    }

    protected function _list(array $input = []) {
        return $this->pseudoRequest('GET', $input);
    }

    protected function _show(array $input = []) {
        $this->path = $this->path . '/' . $input['identifier'];
        return $this->pseudoRequest('GET', $input);
    }

    protected function _remove(array $input = []) {
        $this->path = $this->path . '/' . $input['identifier'];
        return $this->pseudoRequest('DELETE', $input);
    }

    protected function _edit(array $input = []) {
        $this->path = $this->path . '/' . $input['identifier'];
        return $this->pseudoRequest('PUT', $input);
    }

    protected function _add(array $input = []) {
        return $this->pseudoRequest('POST', $input);
    }

    protected function _getpicture(array $input = []) {
        $this->path = $this->path . '/' . $input['identifier'];
        return $this->getPicture($input);
    }

    protected function pseudoRequest($request, array $input) {
        return $this->sendRequest($this->mode, $request, $input);
    }

    /**
     * @param $controller
     * @param $request
     * @param $params
     *
     * @return string
     */
    protected function sendRequest($controller, $request, $params) {
        // 1.1 Init Guzzle.
        $client = new GuzzleHttp\Client();
        $open = config('mainpixelApi.url') . $this->path;


        // 1.2 Do a request into given URL.
        try {
            // 1.4 If method is GET
            if ( in_array(strtoupper($request), ['GET']) ) {
                $job = [
                    'headers' => [
                        'token'    => config('mainpixelApi.token'),
                        'profile'  => config('mainpixelApi.profile'),
                        'language' => app()->getLocale(),
                    ],
                    'query'   => $params,
                ];
                // 1.5 If method not as above.
            } else {
                $job = [
                    'headers' => [
                        'token'    => config('mainpixelApi.token'),
                        'profile'  => config('mainpixelApi.profile'),
                        'language' => app()->getLocale(),
                    ],
                    'form_params' => $params,
                ];
                if (!empty($_FILES))
                    $job['multipart'] = [];
                    foreach ( $_FILES as $file ) {
                        $job['multipart'][] = [
                            'name'     => 'file',
                            'contents' => fopen($file['tmp_name'], 'r'),
                            'filename' => $file['name'],
                        ];
                    }
                }
            }

            // 1.6 Execute request into API Server.
            $res = $client->request(strtoupper($request), (string) $open, $job);
            return json_decode($res->getBody()->getContents(), true);

        } catch (\Exception $ex) {
            abort($ex->getCode(),$ex->getMessage());
            \Log::error($ex);
        }
    }
}
