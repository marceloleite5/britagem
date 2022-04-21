<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\User;

class EmpresasController extends Controller
{
    public function index(){

        $users = User::all();

        $empresas = Empresa::all();

        return view('dashboard.empresas.index', ['empresas' => $empresas, 'users' => $users ]);

    }

    public function create(){

        $users = User::all();

        return view('dashboard.empresas.create', [ 'users' => $users ]);

    }

    public function store(Request $request){

        $empresa = new Empresa;

        $empresa->nome = $request->nome;
        $empresa->endereco = $request->endereco;
        $empresa->tel = $request->tel;
        $empresa->cnpj = $request->cnpj;

        $empresa->save();

        return redirect('/dashboard/empresas')->with('msg', 'Dados cadastrados com sucesso!');

    }

    public function edit($id){

        $users = User::all();

        $empresa = Empresa::findOrFail($id);

        return view('dashboard.empresas.edit', ['empresa' => $empresa, 'users' => $users]);

    }

    public function update(Request $request){

        $data = $request->all();

        Empresa::findOrFail($request->id)->update($data);

        return redirect('/dashboard/empresas')->with('msg','Dados atualizados com sucesso!');
    }

    public function destroy($id){

        Empresa::findOrFail($id)->delete();

        return redirect('/dashboard/empresas')->with('msg', 'Dados excluídos com sucesso!');

    }
}
