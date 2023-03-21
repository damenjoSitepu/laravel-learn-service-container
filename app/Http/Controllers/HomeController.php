<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

// Title
use App\Data\Title\HomeTitle;
// Interfaces 
use App\Interfaces\GoodbyeInterface;

class HomeController extends Controller
{
    public function __construct(
        private GoodbyeInterface $goodBye
    )
    {}

    /**
     * View Of Home Side
     * 
     * @return Illuminate\View\View
     */
    public function index(): View 
    {
        $sayBye = $this->goodBye->sayBye('Vitamin');
        dd($sayBye);
        return view('home.index',[
            'title' => HomeTitle::TITLE['HOME']
        ]);
    }
}
