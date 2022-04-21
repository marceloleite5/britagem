<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Empresa;
use App\Models\User;


class VendasController extends Controller
{

    private $venda;
    public function __construct(Venda $venda, Cliente $cliente, Produto $produto)
    {
        $this->venda = $venda;
        $this->cliente = $cliente;
        $this->produto = $produto;

    }


    public function index(){

        $users = User::all();

        $search = request('search');

        if($search){
            $vendas = Venda::where([
                ['cliente', 'like' , '%'.$search.'%']
            ])->get();
        }else{
            $vendas = Venda::all()->sortByDesc("cliente");
        }
        return view('dashboard.vendas.index', ['vendas' => $vendas, 'search' => $search, 'users' => $users]);
    }

    public function fechamento(){

        dd('Estou aqui em: VendasController no método desconto()');


    }

    public function editdesconto($id){

        //dd('Estou aqui em: VendasController no método desconto()');

        $users = User::all();

        $clientes = Cliente::all();

        $clientes = $this->cliente
                ->orderBy('nome', 'ASC')
                ->get();

        $produtos = Produto::all();

        $produtos = $this->produto
                ->orderBy('nome', 'ASC')
                ->get();

        $venda = Venda::findOrFail($id);

        return view('dashboard.vendas.edit', ['venda' => $venda, 'clientes' => $clientes, 'produtos' => $produtos, 'users' => $users ]);
    }

    public function create(){

        $users = User::all();

        $search = request('search');

        if($search){
            $clientes = Cliente::where([
                ['nome', 'like' , '%'.$search.'%']
            ])->get();
        }else{
           // $clientes = Cliente::all()->sortByDesc("nome");

            $clientes = $this->cliente
                ->orderBy('nome', 'ASC');
                //->get();
        }

        $produtos = Produto::all();

        $produtos = $this->produto
                ->orderBy('nome', 'ASC')
                ->get();

        return view('dashboard.vendas.create', ['clientes' => $clientes, 'produtos' => $produtos, 'search' =>$search, 'users' => $users]);
    }

    public function store(Request $request){

        $venda = new Venda;

        $venda->cliente_id = $request->cliente_id;
        $venda->cliente = $request->cliente;
        $venda->endereco = $request->endereco;
        $venda->cidade = $request->cidade;
        $venda->uf = $request->uf;
        $venda->tel = $request->tel;
        $venda->cpfcnpj = $request->cpfcnpj;
        $venda->produto_id = $request->produto_id;
        $venda->produto = $request->produto;
        $venda->peso = $request->peso;
        $venda->valor = $request->valor;
        $venda->frete = $request->frete;
        $venda->motorista = $request->motorista;
        $venda->desconto = $request->desconto;
        $venda->formadepagamento = $request->formadepagamento;
        $venda->data = $request->data;
        $venda->total = $request->valor * $request->peso;

        $venda->save();

        return redirect('/dashboard/vendas')->with('msg', 'Transação realizada com sucesso!');
    }

    public function edit($id){

        $users = User::all();

        $clientes = Cliente::all();

        $clientes = $this->cliente
                ->orderBy('nome', 'ASC')
                ->get();

        $produtos = Produto::all();

        $produtos = $this->produto
                ->orderBy('nome', 'ASC')
                ->get();

        $venda = Venda::findOrFail($id);

        return view('dashboard.vendas.edit', ['venda' => $venda, 'clientes' => $clientes, 'produtos' => $produtos, 'users' => $users ]);
    }

    public function editfrete($id){

        $venda = Venda::findOrFail($id);

        return view('dashboard.vendas.editfrete', ['venda' => $venda]);
    }

    public function updatefrete(Request $request){

        $this->validate($request,
        ['cliente' => 'required',
        'endereco' => 'required',
        'cidade' => 'required',
        'uf' => 'required',
        'tel' => 'required',
        'cpfcnpj' => 'required',
        'produto' => 'required',
        'peso' => 'required',
        'frete' => 'required',
        'valor' => 'required',
        'desconto' => 'required',
        'formadepagamento' => 'required',
        'total' => 'required',
        'data' => 'required',
        'motorista' => 'required']);

        $venda = Venda::find($request->id);

        $venda->cliente = $request->cliente;
        $venda->endereco = $request->endereco;
        $venda->cidade = $request->cidade;
        $venda->uf = $request->uf;
        $venda->tel = $request->tel;
        $venda->cpfcnpj = $request->cpfcnpj;
        $venda->produto = $request->produto;
        $venda->peso = $request->peso;
        $venda->valor = $request->valor;
        $venda->frete = $request->frete;
        $venda->motorista = $request->motorista;
        $venda->desconto = $request->desconto;
        $venda->formadepagamento = $request->formadepagamento;
        $venda->data = $request->data;
        $venda->total = $request->valor - $request->desconto;

        $venda->save();

        return redirect('/dashboard/vendas')->with('msg', 'Transação realizada com sucesso!');


    }

    public function update(Request $request){


       $data = $request->all();

        Venda::findOrFail($request->id)->update($data);

        return redirect('/dashboard/vendas')->with('msg', 'Transação atualizada com sucesso');

    }

    public function destroy($id){

        Venda::findOrFail($id)->delete();

        return redirect('dashboard/vendas')->with('msg', 'Transação excluída com sucesso!');

    }

    public function show($id){

        $users = User::all();

        $empresas = Empresa::all();

        $venda = Venda::findOrFail($id);

        return view('dashboard.vendas.show', ['venda' => $venda, 'empresas' => $empresas, 'users' => $users ]);

    }


}
