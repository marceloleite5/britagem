<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\User;

class ProdutosController extends Controller
{
    public function index()
    {
        $users = User::all();

        $search = request('search');

        if($search){
            $produtos = Produto::where([
                ['nome' , 'like' , '%'.$search.'%']
            ])->get();
        }else{
            $produtos = Produto::all();
        }

        return view('dashboard.produtos.index', ['produtos' => $produtos, 'search' => $search, 'users' => $users]);
    }

    public function create()
    {
        $users = User::all();

        return view('dashboard.produtos.create', ['users' => $users]);
    }

    public function store(Request $request){

        //dd('Estou aqui em: produtosController no método store()');

        $produto = new Produto;

        $produto->nome = $request->nome;
        $produto->peso = $request->peso;

       $produto->save();

       return redirect('/dashboard/produtos')->with('msg', 'Produto cadastrado com sucesso!');
    }

    public function edit($id){

        $users = User::all();

     //dd('Estou aqui em: ProdutosController no método edit()');
        $produto = Produto::findOrFail($id);

        return view('dashboard.produtos.edit', ['produto' => $produto, 'users' => $users]);


    }

    public function update(Request $request){

        //dd('Estou aqui em: CategoryController no método edit()');

        $data = $request->all();

        Produto::findOrFail($request->id)->update($data);

        return redirect('/dashboard/produtos')->with('msg', 'Produto modificado com sucesso!');
    }

    public function destroy($id){

        Produto::findOrFail($id)->delete();

        return redirect('/dashboard/produtos')->with('msg', 'Produto excluído com sucesso');

    }


}
