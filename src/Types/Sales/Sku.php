<?php
/*******************************************************************************
 * Copyright (C) 2016 - 11-8-16 14:18
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/

namespace Mainpixel\Api\Types\Sales;

use Mainpixel\Api\MainpixelApi;

class Sku extends MainpixelApi{

	protected $path = 'sales/sku';

	protected $allowed = [
		'show',
	];

}