<?php
/**
 * Project: support plugin localizer
 *
 * Author: Farhan Wazir
 * Email: farhan.wazir@gmail.com, seejee1@gmail.com
 * Date: 3/25/2017
 * Time: 5:00 AM
 *
 *
 *
 * This project file is not redistributeable without permissions.
 * For more details about redistribution and reselling, contact to provided author details.
 */

Route::group([
    'namespace' => 'MCMIS\Support\Plugins\Localizer\Http', 'middleware' => 'web',
], function ($router) {
    $router->get('/lang/{lang}', 'Controller@change');
});