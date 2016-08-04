<?php
/*******************************************************************************
 * Copyright (C) 2016 - 3-8-16 17:31
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/

namespace Mainpixel\Api\Types\Sales;

use Mainpixel\Api\MainpixelApi;

class ProductImages extends MainpixelApi{

	protected $path = 'sales/product-image';

	protected $allowed = [
		'add',
		'list',
		'show',
		'remove',
	];

}