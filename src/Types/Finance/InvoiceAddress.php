<?php
/*******************************************************************************
 * Copyright (C) 2016 - 8-9-16 09:52
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/

namespace Mainpixel\Api\Types\Finance;

use Mainpixel\Api\MainpixelApi;

class InvoiceAddress extends MainpixelApi{

	protected $path = 'finance/address';

	protected $allowed = [
		'edit',
    'show'
	];

}
