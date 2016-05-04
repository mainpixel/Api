<?php
/**
 *
 * Copyright (C) 4/5/2016 (dd-mm-yyyy).
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 *
 */

namespace Mainpixel\Api\Types;

use Mainpixel\Api\MainpixelApi;

class Domains extends MainpixelApi{

	protected $allowed = [
		'add',
		'edit',
		'show',
		'list',
	];

}