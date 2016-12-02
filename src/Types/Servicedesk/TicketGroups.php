<?php
/*******************************************************************************
 * Copyright (C) 2016 - 26-11-16 10:37
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/
 
namespace Mainpixel\Api\Types\Servicedesk;
use Mainpixel\Api\MainpixelApi;

class TicketGroups extends MainpixelApi{
	protected $path = 'servicedesk/ticket-groups';
	protected $allowed = [
		'show',
		'list',
	];
}
