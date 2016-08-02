<?php
/*******************************************************************************
 * Copyright (C) 2016 - 1-8-16 13:59
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/

namespace Mainpixel\Api\Types\Finance;

use Mainpixel\Api\MainpixelApi;

class Invoices extends MainpixelApi{

	protected $path = 'finance/invoices';

	protected $allowed = [
		'add',
		'edit',
		'show',
		'list',
	];

}