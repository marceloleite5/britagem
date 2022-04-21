<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;

class ClientesController extends Controller
{
    public function index()
    {
        $users = User::all();

        $search = request('search');

        if($search){
            $clientes = Cliente::where([
                ['nome' , 'like' , '%'.$search.'%']
            ])->get();
        }else{
            $clientes = Cliente::all();
        }

        return view('dashboard.clientes.index', ['clientes' => $clientes, 'search' => $search, 'users' => $users]);
    }

    public function create(){

        $users = User::all();

        return view('dashboard.clientes.create', [ 'users' => $users]);
    }

    public function store(Request $request){

        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->endereco = $request->endereco;
        $cliente->cidade = $request->cidade;
        $cliente->uf = $request->uf;
        $cliente->tel = $request->tel;
        $cliente->limit = $request->limit;
        $cliente->cpfcnpj = $request->cpfcnpj;
        $cliente->status = $request->status;

        $cliente->save();

        return redirect('/dashboard/clientes')->with('msg', 'Cliente cadastrado com sucesso!');
    }

    public function edit($id){

        $users = User::all();

        $cliente = Cliente::findOrFail($id);

        return view('dashboard.clientes.edit', ['cliente' => $cliente, 'users' => $users]);

    }

    public function update(Request $request){

        $data = $request->all();

        Cliente::findOrFail($request->id)->update($data);

        return redirect('/dashboard/clientes')->with('msg','Cliente atualizado com sucesso!');
    }

    public function destroy($id){

        Cliente::findOrFail($id)->delete();

        return redirect('/dashboard/clientes')->with('msg','Cliente excluído com sucesso!');
    }

}
