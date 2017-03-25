<?php
/**
 * Project: support
 *
 * Author: Farhan Wazir
 * Email: farhan.wazir@gmail.com, seejee1@gmail.com
 * Date: 3/25/2017
 * Time: 5:05 AM
 *
 *
 *
 * This project file is not redistributeable without permissions.
 * For more details about redistribution and reselling, contact to provided author details.
 */

namespace MCMIS\Support\Plugins\Localizer;


class Registrar
{

    public function register($app){
        require_once __DIR__.'/Http/router.php';
    }

}