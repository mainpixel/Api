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

    'url'   => 'YOUR-NODE-DOMAIN/api/v1/',
    'token' => 'YOUR-ACCESS-TOKEN',
    'profile' => 'YOUR-PROFILE-ID',
    'user_id' => 'UNIQUE-USER-ID (optional)',

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
];
