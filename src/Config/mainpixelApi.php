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
     * Localization.
     *
     * Locale_from
     * Specify if locale must be taken from the 'config' file, or from your laravel
     * install like app()->getLocale().
     *
     * locale
     * At this point we cover three languages like 'en' (English), 'de' (German) and 'nl' (Dutch).
     *
     */
    'locale_from' => 'config',
    'locale' => 'en',

    /*
     *
     * ONLY ENABLED FOR SERVER ADMIN's
     *
     * If you are hosting your own private server and building an application witch allow people to
     * manage their profiles. You can add a API token witch allow 'all' profiles by default.
     *
     * You can overwrite below value by doing 'config(["MainpixelApi.profile"=>'YOUR-PROFILE-ID'])'
     * So when force every api-call with the right selected profileID.
     */

    'profile' => '',
];