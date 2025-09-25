<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TextoHome;

class PrincipalController extends Controller
{
    public function home()
    {
        $pageTitle = 'Página Inicial';

        $texto = TextoHome::latest()->first();
        
        $conteudoHome = $texto ? $texto->conteudo : 'Bem-vindo ao site';

        return view('pages.home', compact('pageTitle','conteudoHome'));
    }
}
