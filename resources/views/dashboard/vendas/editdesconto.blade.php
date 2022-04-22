@extends('layouts.main')

@section('title', 'Page Title')

@section('content')



    <!-- Main Content -->
    <div id="content">

        <div class="container-fluid">


            <div class="row">

            </div>

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <a href="/dashboard/vendas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i> Voltar</a>
                            <h2 class="m-0 font-weight-bold text-primary">Modificar transação</h2>
                            <div class="dropdown no-arrow">
                              <!--   <a href="/produtos" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-sm text-white-50"></i> Voltar</a>-->
                            </div>
                        </div>
                        <br>
                        <div class="col-md-9">
                            @section('script')
                                <script>
                                    $(document).ready(function($){
                                        $('#telefone').mask('(99) 9 9999-9999');
                                        $('#cnpj').mask('00.000.000/0000-00');
                                        $('#money').mask("#.###,00", {reverse: true});
                                    });
                                </script>
                                @endsection
                            <h3 class="m-0 font-weight-bold text-primary">Editando:<b> {{ $venda->cliente }}</b></h3>
                            <form action="/dashboard/vendas/update/{{ $venda->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <br>
                                Nome/Razão social:
                                <input type="text" class="form-control"  name="cliente"  value="{{ $venda->cliente }}">
                                <br>
                                Produto:
                                <input type="text" class="form-control"  name="produto"  value="{{ $venda->produto }}">
                                <br>
                                Peso:
                                <input type="text" class="form-control"  name="peso"  value="{{ $venda->peso }}">
                                <br>
                                Frete:
                                <input type="text" class="form-control"  name="frete"  value="{{ $venda->frete }}">
                                <br>
                                Desconto:
                                <input type="text" class="form-control"  name="desconto"  value="{{ $venda->desconto }}">
                                <br>
                                Motorista2:
                                <input type="text" class="form-control"  name="motorista"  value="{{ $venda->motorista }}">
                                <br>
                                Valor:
                                <input type="text" class="form-control"  name="valor"  value="{{ $venda->valor }}">
                                <br>

                                Forma de pagamento:
                                <select name="formadepagamento" id="formadepagamento" value="{{ $venda->formadepagamento }}" class="form-control">
                                    <option value="À vista">À vista</option>
                                    <option value="À prazo">À prazo</option>
                                </select>
                                <br>

                                <input type="hidden" class="form-control" id="total" name="total"  value="{{ $venda->total }}">
                                <br>
                                Data:
                                <input type="date" class="form-control" id="data" name="data"  value="{{ $venda->data }}">
                                <br>

                                <input type="submit" class="btn btn-primary" value="Editar">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Fontes de receita</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart">Teste</canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Teste
                                </span>
                                                    <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Teste
                                </span>
                                                    <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Teste
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop















