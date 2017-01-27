<?php
/*******************************************************************************
 * Copyright (C) 2016 - 1-27-2017 08:22
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/

namespace Mainpixel\Api\Types\Finance;

use Mainpixel\Api\MainpixelApi;

class RecurringInvoices extends MainpixelApi{

	protected $path = 'finance/recurring-invoices';

	protected $allowed = [
		'add',
		'edit',
		'show',
		'list',
		'remove',
	];

}
