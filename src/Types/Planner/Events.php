<?php
/*******************************************************************************
 * Copyright (C) 2016 - 07-02-16 14:07
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/
 
namespace Mainpixel\Api\Types\Planner;
use Mainpixel\Api\MainpixelApi;

class Events extends MainpixelApi{
	protected $path = 'planner/events';
	protected $allowed = [
		'add',
		'edit',
		'show',
		'list',
		'remove',
	];
}
