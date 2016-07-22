<?php
/*******************************************************************************
 * Copyright (C) 2016 - 21-7-16 11:59
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/

namespace Mainpixel\Api\Types\Hosting;

use Mainpixel\Api\MainpixelApi;

class Databases extends MainpixelApi{

	protected $path = 'hosting/databases';

	protected $allowed = [
		'add',
		'edit',
		'show',
		'list',
		'remove',
	];

}