<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function aboutUs()
    {
        $pageTitle = 'Sobre Nós';
        return view('pages.aboutus', compact('pageTitle'));
    }
}
