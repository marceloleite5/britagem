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
                            <a href="/dashboard/clientes" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i> Voltar</a>
                            <h2 class="m-0 font-weight-bold text-primary">Editar Clientes</h2>
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
                            <h3 class="m-0 font-weight-bold text-primary">Editando:<b> {{ $cliente->nome }}</b></h3>
                            <form action="/dashboard/clientes/update/{{ $cliente->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <br>
                                Nome:
                                <input type="text" class="form-control" id="nome" name="nome"  value="{{ $cliente->nome }}">
                                <br>
                                Endereço:
                                <input type="text" class="form-control" id="endereco" name="endereco"  value="{{ $cliente->endereco }}">
                                <br>
                                Cidade:
                                <input type="text" class="form-control" id="cidade" name="cidade"  value="{{ $cliente->cidade }}">
                                <br>
                                Estado:
                                <select name="uf" id="uf" class="form-control">
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rodônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>

                                </select>
                                <br>
                                Celular:
                                <input type="text" class="form-control" id="telefone" name="tel"  value="{{ $cliente->tel }}">
                                <br>
                                Limite:
                                <input type="text" class="form-control" id="money" name="limit"  value="{{ $cliente->limit }}">
                                <br>
                                CNPJ:
                                <input type="text" class="form-control" id="cnpj" name="cpfcnpj"  value="{{ $cliente->cpfcnpj }}">
                                <br>
                                Situação:

                                <select name="status" id="status" value="{{ $cliente->status }}" class="form-control">
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                </select>
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

@stop


