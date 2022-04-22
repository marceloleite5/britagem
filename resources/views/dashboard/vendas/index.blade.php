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
                    <div class="card shadow mb-12">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

<!-- Form de busca -->
<form action="/dashboard/vendas" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" id="search" name="search" class="form-control bg-light border-0 small" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"> Buscar</i>
            </button>
        </div>
    </div>
</form>
@if($search)
<h6>Buscando por: {{ $search }}</h6>
@else

@endif


</div>
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <div class="dropdown no-arrow">
        <h3 class="m-0 font-weight-bold text-primary">Todas as transações</h3>
    </div>

    </div>
                        <br>
                        @foreach ($vendas as $venda)
                <div class="container-fluid">
                        <div class="container">
                            <div class="row">
                              <div class="col">
                               <h4>{{ $venda->cliente }}</h4>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                 Produto:  {{ $venda->produto }}
                                </div>
                                <div class="col">


                                 </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Forma de pagamento: {{ $venda->formadepagamento }}
                                </div>
                                <div class="col">
                                    Quantidade: {{ $venda->peso }} M³
                                 </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Frete: R${{ number_format($venda->frete, 2,',','.') }}
                                </div>
                                <div class="col">
                                    Valor unitário:  R$ {{ number_format($venda->valor, 2,',','.') }}
                                 </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Data de emissão: {{ date('d/m/Y', strtotime($venda->data)) }}
                                </div>
                                <div class="col">
                                    Total do Produto: R$ {{ number_format($venda->total, 2,',','.') }}
                                 </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                              <!--<div class="col">
                                <a href="{{url("/dashboard/vendas/edit/$venda->id")}}" class="btn btn-info edit-btn">
                                    <ion-icon name="create-outline"></ion-icon>Modificar</a>

                              </div>-->
                              <!--<div class="col">
                                <a href="{{url("/dashboard/vendas/editdesconto/$venda->id")}}" class="btn btn-info edit-btn">
                                    <ion-icon name="create-outline"></ion-icon>Desconto</a>
                              </div>-->
                              <div class="col">
                                <form action="/dashboard/vendas/{{ $venda->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">
                                    <ion-icon name="trash-outline"></ion-icon>Deletar</button>
                                </form>
                              </div>
                              <div class="col"></div>
                              <div class="col"></div>
                              <div class="col"></div>
                              <div class="col"></div>
                             <div class="col">
                                <a href="/dashboard/vendas/{{ $venda->id}}" class="btn btn-primary">Visualizar</a>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr>
                </div>
                        @endforeach
                        @if (count($vendas) == 0 && $search)
                        <h2>Transação inexistente!</h2>
                        @elseif(count($vendas) == 0)
                            <h1>Sem transações!</h1>
                        @endif
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
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direto
                            </span>
                                                <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                            </span>
                                                <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    													<!-- Edit Modal -->

@stop

