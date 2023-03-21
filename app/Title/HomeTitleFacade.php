<?php 

namespace App\Title;

// Facades
use Illuminate\Support\Facades\Facade;

class HomeTitleFacade extends Facade{
    protected static function getFacadeAccessor()
    {
        return 'homeTitle';
    }
}