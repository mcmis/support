<?php

namespace MCMIS\Support;

use Illuminate\Contracts\Foundation\Application;
use MCMIS\Support\Filters\Email\EventTemplate;

class Register
{

    protected $app;

    /**
     * Bootstrap script
     *
     * @param Application $app
     * @return void
     */
    public function bootstrap(Application $app){
        $this->app = $app;

        $this->registerFilters();

        $this->registerPlugins();
    }

    protected function registerFilters(){
        $this->filterEmailTemplate();
    }

    protected function registerPlugins(){
        (new \MCMIS\Support\Plugins\Localizer\Registrar())->register($this->app);
    }

    protected function filterEmailTemplate(){
        $this->app->bind('GetEmailTemplate', function ($app) {
            return new EventTemplate();
        });

        $this->app->bind('MCMIS\Contracts\Filters\EmailTemplate', 'MCMIS\Support\Filters\Email\EventTemplate');
    }

}
