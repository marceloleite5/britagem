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

                        <a href="/dashboard/produtos" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i> Voltar</a>
                        <h6 class="m-0 font-weight-bold text-primary">Cadastro de produtos</h6>
                        <div class="dropdown no-arrow">

                        </div>

                    </div>
                <div class="form-group">
                    <form action="/produtos" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <label for="nome" class="m-0 font-weight-bold text-primary" >Nome do Produto: </label>
                                <input class="form-control" type="text" name="nome" id="nome" placeholder="nome do produto" aria-describedby="basic-addon1" required>
                            </span>
                    </div>
                    <div class="form-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <label for="peso" class="m-0 font-weight-bold text-primary" >Densidade </label>
                            <input class="form-control" type="text" name="peso" id="peso" placeholder="1300" aria-describedby="basic-addon1" required>
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


