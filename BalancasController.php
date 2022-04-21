<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balanca;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Empresa;
use App\Models\User;

class BalancasController extends Controller
{
    private $balanca;
    public function __construct(Balanca $balanca, Cliente $cliente, Produto $produto)
    {
        $this->balanca = $balanca;
        $this->cliente = $cliente;
        $this->produto = $produto;

    }
    public function index(){

        $users = User::all();


         //dd('Estou aqui em: BalancasController no método index()');

       $balancas = Balanca::all();

        return view('dashboard.balancas.index', ['balancas' => $balancas, 'users' => $users ]);
    }

    public function create(){

        $users = User::all();

        $clientes = Cliente::all();

        $clientes = $this->cliente
                ->orderBy('nome', 'ASC')
                ->get();

        $produtos = Produto::all();

        $produtos = $this->produto
                ->orderBy('nome', 'ASC')
                ->get();

        return view('dashboard.balancas.create',['clientes' => $clientes, 'produtos' => $produtos, 'users' => $users]);
    }

    public function store(Request $request){

        $balanca = new Balanca;

        $balanca->empresa = $request->empresa;
        $balanca->placa = $request->placa;
        $balanca->densidade = $request->densidade;
        $balanca->pesovazio = $request->pesovazio;
        $balanca->pesocheio = $request->pesocheio;
        $balanca->ton = $request->ton;
        $balanca->metros = $request->metros;
        $balanca->data = $request->data;

        $balanca->save();

        return redirect('/dashboard/balancas')->with('msg', 'Pesagem realizada com sucesso!');
    }

    public function edit($id){

        $users = User::all();

        $balanca = Balanca::findOrFail($id);

        return view('dashboard.balancas.edit', ['balanca' => $balanca, 'users' => $users]);
    }


    public function update(Request $request){

        $data = $request->all();

        Balanca::findOrFail($request->id)->update($data);

        return redirect('/dashboard/balancas')->with('msg', 'Balança atualizada com sucesso!');
    }

    public function show($id){

        $users = User::all();

        $empresas = Empresa::all();

        $balanca = Balanca::findOrFail($id);

        return view('dashboard.balancas.show', ['balanca' => $balanca, 'empresas' => $empresas,'users' => $users ]);

    }

    public function destroy($id){

        Balanca::findOrFail($id)->delete();

        return redirect('/dashboard/balancas')->with('msg', 'Balança excluída com sucesso!');
    }
}
