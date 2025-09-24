<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function home()
    {
        $pageTitle = 'Página Inicial';
        return view('pages.home', compact('pageTitle'));
    }
}
