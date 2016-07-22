<?php
/*******************************************************************************
 * Copyright (C) 2016 - 21-7-16 18:09
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/

namespace Mainpixel\Api\Types\Hosting;

use Mainpixel\Api\MainpixelApi;

class Keys extends MainpixelApi{

	protected $path = 'hosting/keys';

	protected $allowed = [
		'add',
		'edit',
		'show',
		'list',
		'remove',
	];

}