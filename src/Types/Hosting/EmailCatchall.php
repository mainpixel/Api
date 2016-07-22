<?php
/*******************************************************************************
 * Copyright (C) 2016 - 19-7-16 15:13
 * Mainpixel B.V.  - All Rights Reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Written by Jasper Berkhout <jasper@mainpixel.io>.
 ******************************************************************************/

namespace Mainpixel\Api\Types\Hosting;

use Mainpixel\Api\MainpixelApi;

class EmailCatchall extends MainpixelApi {

    protected $path = 'hosting/mail-catchalls';

    protected $allowed = [
        'add',
        'edit',
        'show',
        'list',
        'remove',
    ];
}