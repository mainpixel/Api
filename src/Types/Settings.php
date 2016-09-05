<?php
/*******************************************************************************
 * Copyright (C) 2016 - 10-8-16 19:44
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/

namespace Mainpixel\Api\Types;

use Mainpixel\Api\MainpixelApi;

class Settings extends MainpixelApi{

	protected $path = 'settings';

	protected $allowed = [
		'show',
		'edit',
	];

}
