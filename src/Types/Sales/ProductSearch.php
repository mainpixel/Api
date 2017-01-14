<?php
/*******************************************************************************
 * Copyright (C) 2016 - 10-8-16 16:39
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/
namespace Mainpixel\Api\Types\Sales;
use Mainpixel\Api\MainpixelApi;
class ProductSearch extends MainpixelApi{
	protected $path = 'sales/product-search';
	protected $allowed = [
		'add',
	];
}
