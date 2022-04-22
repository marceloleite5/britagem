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
                        <a href="/dashboard/fornecedores" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i> Voltar</a>
                        <h6 class="m-0 font-weight-bold text-primary">Cadastro de Fornecedores</h6>
                        <div class="dropdown no-arrow">

                        </div>

                    </div>
                <div class="form-group">
                    @section('script')
                    <script>
                        $(document).ready(function($){
                            $('#telefone').mask('(99) 9 9999-9999');
                            $('#cnpj').mask('00.000.000/0000-00');
                            $('#money').mask("#.###,00", {reverse: true});
                          });
                    </script>
                    @endsection
                    <form action="/fornecedores" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="nome" class="m-0 font-weight-bold text-primary" >Nome/Razão Social: </label>
                                <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome da Empresa" aria-describedby="basic-addon1" required>
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="nome" class="m-0 font-weight-bold text-primary" >Endereço: </label>
                                <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Rua dos aflitos nº10, bairro Centro, Jacobina-BA" aria-describedby="basic-addon1" required>
                            </span>
                        </div>


                        <div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="nome" class="m-0 font-weight-bold text-primary" >Celular: </label>
                            <input class="form-control" type="text" name="tel" id="telefone" placeholder="(31) 9 0909-0000" aria-describedby="basic-addon1" required>
                            </span>

                        </div>

                        <div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="nome" class="m-0 font-weight-bold text-primary" >CNPJ: </label>
                                <input class="form-control" type="text" name="cnpj" id="cnpj" placeholder="00.000.000/0000-00" aria-describedby="basic-addon1" required>
                            </span>
                        </div>

                </div>
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" value="Salvar">
                  </div>
                    </form>
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


