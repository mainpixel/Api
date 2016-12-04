<?php
/*******************************************************************************
 * Copyright (C) 2016 - 04-12-16 17:22
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/
 
namespace Mainpixel\Api\Types\Servicedesk;
use Mainpixel\Api\MainpixelApi;
class TicketDownload extends MainpixelApi{
	protected $path = 'servicedesk/ticket-download';
	protected $allowed = [
		'show',
	];
}
