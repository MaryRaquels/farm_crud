<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public readonly Produto $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }

    public function index()
    {
        $produtos = $this->produto->all();
        return view('produtos', ['produtos' => $produtos]);   
    }

    public function create()
    {
        return view('produtos_create');    
    }

    public function store(StoreUpdateRequest $request)
    {
        $created = $this->produto->create([
            'nome' => $request->input('nome'),
            'quantidade' => $request->input('quantidade'),
            'valor' => $request->input('valor'),
        ]);
        if($created){
            return redirect()->back()->with('message', 'Adicionado com sucesso!');
        }

        return redirect()->back()->with('message', 'Ops!Algo deu errado');
    }

    public function show(string $id)
    {
        //return view('produtos', ['produto' => $produto]);
    }

    public function edit(Produto $produtos)
    {
        return view('produto_edit', ['produto' => $produtos]);
    }

    public function update(Request $request, string $id)
    {
        $updated = $this->produto->where('id', $id)->update($request->except(['_token', '_method']));
        if($updated){
            return redirect()->back()->with('message', 'Atualizado com sucesso!');
        }

        return redirect()->back()->with('message', 'Ops!Algo deu errado');

    }   

    public function destroy(string $id)
    {
        $this->produto->where('id', $id)->delete();

        return redirect()->route('produtos.index');
    }
}
