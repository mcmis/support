<?php

namespace MCMIS\Support\Plugins\Localizer\Http;

use MCMIS\Foundation\BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    public function change($lang){
        Session::set('lang', $lang);
        return redirect()->back();
    }
}
