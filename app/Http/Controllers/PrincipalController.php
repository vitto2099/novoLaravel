<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto; // 1. IMPORTAMOS O MODEL DE PRODUTO

class PrincipalController extends Controller
{
    /**
     * 2. MODIFICAMOS A FUNÇÃO 'home'
     */
    public function home()
    {
        // 3. Pega todos os produtos do banco, os mais recentes primeiro
        $produtos = Produto::orderBy('created_at', 'desc')->get();

        // 4. Envia a variável $produtos para a view 'pages.index'
        return view('pages.index', compact('produtos'));
    }
}