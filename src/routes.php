<?php
/**
 * Project: support
 *
 * Author: Farhan Wazir
 * Email: farhan.wazir@gmail.com, seejee1@gmail.com
 * Date: 3/26/2017
 * Time: 5:36 AM
 *
 *
 *
 * This project file is not redistributeable without permissions.
 * For more details about redistribution and reselling, contact to provided author details.
 */

$router->group(['namespace' => 'MCMIS\Foundation\Base'], function ($route) {

    //routing
    $route->resource('/cms/email/template', 'Email\Event\Template\Controller');

});