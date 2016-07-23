<?php
/*******************************************************************************
 * Copyright (C) 2016 - 23-7-16 14:39
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/

namespace Mainpixel\Api\Types\Hosting;

use Mainpixel\Api\MainpixelApi;

class Backups extends MainpixelApi{

	protected $path = 'hosting/backups';

	protected $allowed = [
		'add',
		'edit',
		'show',
		'list',
		'remove',
	];

}