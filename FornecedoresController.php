<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\User;

class FornecedoresController extends Controller
{
    public function index(){

        $users = User::all();

        $search = request('search');

        if ($search) {
            $fornecedores = Fornecedor::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $fornecedores = Fornecedor::all();
        }

        return view('dashboard.fornecedores.index', ['fornecedores' => $fornecedores, 'search' => $search, 'users' => $users]);

    }

    public function create(){

        $users = User::all();

        return view('dashboard.fornecedores.create', ['users' => $users]);
    }

    public function store(Request $request){

        $fornecedores = new Fornecedor;

        $fornecedores->nome = $request->nome;
        $fornecedores->endereco = $request->endereco;
        $fornecedores->tel = $request->tel;
        $fornecedores->cnpj = $request->cnpj;

        $fornecedores->save();

        return redirect('/dashboard/fornecedores')->with('msg', 'Fornecedor cadastrado com sucesso!');

    }

    public function edit($id){

        $users = User::all();

        $fornecedores = Fornecedor::findOrFail($id);

        return view('dashboard.fornecedores.edit',['fornecedores' => $fornecedores, 'users' => $users]);
    }

    public function update(Request $request){

        $data = $request->all();

        Fornecedor::findOrFail($request->id)->update($data);

        return redirect('/dashboard/fornecedores')->with('msg','Fornecedor atualizado com sucesso!');

    }

    public function destroy($id){

        Fornecedor::findOrFail($id)->delete();

        return redirect('/dashboard/fornecedores')->with('msg','Fornecedor excluído com sucesso!');

    }
}
