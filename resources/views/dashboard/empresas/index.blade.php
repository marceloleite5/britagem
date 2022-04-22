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

<h6 class="m-0 font-weight-bold text-primary">Dados da empresa</h6>

                            <div class="dropdown no-arrow">

                            </div>

                        </div>

                        <br>
                        @foreach ($empresas as $empresa)
                        <ul>

                            <table><th>
                                <td>
                              <li><b> {{ $empresa->nome }}</b> | CNPJ: {{ $empresa->cnpj }}<br>
                                Endereço:{{ $empresa->endereco}} <br>
                                Tel.: {{ $empresa->tel }}
                              </td>
                              <td></td>
                              <td></td>
                              <td></td>
                                <td></td>
                              <td>
                                <a href="{{url("/dashboard/empresas/edit/$empresa->id")}}" class="btn btn-info edit-btn">
                                    <ion-icon name="create-outline"></ion-icon>Editar</a>
                                </td>
                                <td></td>
                                <td>
                                    <form action="/dashboard/empresas/{{ $empresa->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon>Deletar</button>
                                    </form>

                                </li>
                            </td></th></table>
                            <hr>
                            </ul>

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

@stop

