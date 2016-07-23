<?php

return [
    /*
     * Mainpixel.io
     *
     * Create your own credentials inside our platform.
     *
     * Need support? Set a issue in GitHub or send us an e-mail (support@mainpixel.io).
     *
     * Auth. based on token & whitelisted IP.
     * Please check documentation for a how-to.
     */

    'url'   => 'YOUR-DOMAIN/api/v1/',
    'token' => 'YOUR-TOKEN',

    /*
     *
     * ONLY ENABLED FOR SERVER ADMIN's
     *
     * If you are running a private server and building a application witch allow people to
     * manage their profiles. You can add a API token witch allow 'all' profiles by default.
     *
     * You can overwrite below value by doing 'config(["MainpixelApi"=>'YOUR-PROFILE-ID'])'
     * So when force every api-call with the right selected profileID.
     */

    'profile' => '',
];