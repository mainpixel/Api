<?php
/**
 *
 * Copyright (C) 25/10/2017 (dd-mm-yyyy).
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 *
 */
namespace Mainpixel\Api\Types\Crm;
use Mainpixel\Api\MainpixelApi;
class Auth extends MainpixelApi{
	protected $path = 'crm/auth';
	protected $allowed = [
  'add',
		'edit',
		'show',
	];
}
