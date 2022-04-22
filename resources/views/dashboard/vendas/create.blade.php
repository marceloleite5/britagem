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

                        <div class="dropdown no-arrow">
                            <form action="/dashboard/vendas/create" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" id="search" name="search" class="form-control bg-light border-0 small" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"> Buscar</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                <div class="form-group">
                    @section('script')
                    <script>
                        $(document).ready(function($){
                            $('#cnpj').mask('00.000.000/0000-00');
                            $('#money').mask("#.##0,00", {reverse: true});
                            $('#valor1').mask("#.##0,00", {reverse: true});
                          });
                    </script>
                    @endsection


                    @if($search)
                    <ul>
                    <li><b>Buscando por: {{ $search }}</b></li>
                    </ul>
                    @else
                    <li><h6 class="m-0 font-weight-bold text-primary"></h6></li>
                    @endif

                    @foreach ($clientes as $cliente)
                    <ul>
                              <li><b>Cliente: {{ $cliente->nome }}</b> <br>
                            <li><b>Endereço: {{ $cliente->endereco }}</b> <br>
                        </ul>
                    <form action="/vendas" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input class="form-control" type="hidden" name="peso" id="peso"  aria-describedby="basic-addon1">
                        <div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="" class="m-0 font-weight-bold text-primary" >Razão Social: </label>
                                <input class="form-control" type="text" name="cliente" value="{{$cliente->nome}}" aria-describedby="basic-addon1" required>
                            </span>
                        </div>
                        <input type="hidden" name="endereco" value="{{$cliente->endereco}}">
                        <input type="hidden" name="cidade" value="{{$cliente->cidade}}">
                        <input type="hidden" name="uf" value="{{$cliente->uf}}">
                        <input type="hidden" name="tel" value="{{$cliente->tel}}">
                        <input type="hidden" name="cpfcnpj" value="{{$cliente->cpfcnpj}}">
                        <div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="produto" class="m-0 font-weight-bold text-primary" >Produto: </label>
                                <select class="form-control" name="produto">
                                    <option value="produto">Selecione</option>
                                    @foreach($produtos as $produto)
                                        <option value="{{$produto->nome}}">{{$produto->nome}}</option>
                                    @endforeach

                                </select>
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="peso" class="m-0 font-weight-bold text-primary" >Quantidade M³: </label>
                                <input class="form-control" type="text" name="peso" id="peso" placeholder="14.5" aria-describedby="basic-addon1" required>
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="nome" class="m-0 font-weight-bold text-primary" >Valor: </label>
                            <input class="form-control" type="text" name="valor" id="valor" placeholder="45.00" aria-describedby="basic-addon1" required>
                            </span>

                        </div>

                        <div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="peso" class="m-0 font-weight-bold text-primary" >Frete: </label>
                                <input class="form-control" type="text" name="frete" id="frete" placeholder="220.00" aria-describedby="basic-addon1">
                            </span>
                        </div>

                        <div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="peso" class="m-0 font-weight-bold text-primary" >Motorista: </label>
                                <input class="form-control" type="text" name="motorista" id="motorista" placeholder="João da Silva" aria-describedby="basic-addon1" required>
                            </span>
                        </div>
                        <!--<div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="peso" class="m-0 font-weight-bold text-primary" >Desconto: </label>-->
                                <input class="form-control" type="hidden" name="desconto" id="desconto" aria-describedby="basic-addon1">
                         <!--</span>
                        </div>-->


                        <div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="nome" class="m-0 font-weight-bold text-primary" >Forma de pagamento: </label>
                                <select name="formadepagamento" id="formadepagamento" class="form-control">
                                    <option value="À vista">À vista</option>
                                    <option value="À prazo">À prazo</option>
                                </select>
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="nome" class="m-0 font-weight-bold text-primary" >Data de emissão: </label>
                                <input class="form-control" type="date" name="data" id="data"  aria-describedby="basic-addon1" required>
                            </span>
                        </div>

                                <input class="form-control" type="hidden" name="total" id="total"  aria-describedby="basic-addon1" required>

                </div>
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" value="Salvar">
                  </div>
                    </form>
                    @endforeach
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
                            <i class="fas fa-circle text-primary"></i> Direct
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
    <script>
        $(function(){
            $('#editModal').on('show.bs.modal', function (event) {
                //atribuindo os data-name (name)
                var button = $(event.relatedTarget)
                var recipient = button.data('id')
                var recipient2 = button.data('name')
                var recipient3 = button.data('mail')
                var recipient4 = button.data('tel')
                var recipient5 = button.data('teste')
                var modal = $(this)
                //insere os valores dentro dos inputs pelo id
                modal.find('.modal-title').text('Verification Code ' + recipient)
                modal.find('#recipient-id').val(recipient)
                modal.find('#recipient-name').val(recipient2)
                modal.find('#recipient-mail').val(recipient3)
                modal.find('#recipient-tel').val(recipient4)
                modal.find('#recipient-teste').val(recipient5)
            });

        });
    </script>

@stop


