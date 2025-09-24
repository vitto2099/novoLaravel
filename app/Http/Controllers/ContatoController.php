<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
   public function contact()
    {
        $pageTitle = 'Entre em Contato';
        return view('pages.contact', compact('pageTitle'));
    }
}
