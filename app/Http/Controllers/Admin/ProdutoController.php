<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    /**
     * CORREÇÃO: A chave '}' estava no lugar errado,
     * quebrando a função.
     */
    public function index()
    {
        $produtos = Produto::orderBy('created_at','desc')->get();
        return view('pages.admin.produtos.index', compact('produtos'));
    } // <-- A chave '}' DEVE estar aqui.

    public function create()
    {
        return view('pages.admin.produtos.create');
    }

    public function store(Request $request)
    {
        /**
         * CORREÇÃO: O texto do PDF para as regras de 'validate'
         * estava mal formatado. Esta é a versão correta.
         */
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'imagem' => 'nullable|image|max:2048' // 2MB
        ]);

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('products', 'public');
            $validated['imagem'] = $path; // ex: products/abcd.jpg
        }

        Produto::create($validated);

        return redirect()->route('admin.produtos.index')->with('success', 'Produto cadastrado.');
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('pages.produtos.show', compact('produto'));
    }
}