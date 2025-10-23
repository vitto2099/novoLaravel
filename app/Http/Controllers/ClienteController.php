<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function create()
    {
        return view('pages.cadastro');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:clientes,cpf',
            'email' => 'required|email|unique:clientes,email',
            'cep' => 'required|string',
            'logradouro' => 'nullable|string',
            'bairro' => 'nullable|string',
            'cidade' => 'nullable|string',
            'uf' => 'nullable|string|size:2',
        ]);

        Cliente::create($validated);

        return redirect()->route('cadastro.create')->with('success', 'Cadastro realizado com sucesso!');
    }

    public function index()
    {
        $clientes = Cliente::orderBy('nome')->get();
        return view('pages.admin.clientes.index', compact('clientes'));
    }
}