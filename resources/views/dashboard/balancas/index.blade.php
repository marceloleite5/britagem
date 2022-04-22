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

                            <div class="dropdown no-arrow">
                                <a href="{{url("/dashboard/balancas/create")}}" class="btn btn-info edit-btn">
                                    <ion-icon name="create-outline"></ion-icon>Nova pesagem</a>
                            </div>

                        </div>
                        <div class="col">


                      </div>

                        <br>
                        @foreach ($balancas as $balanca)
                <div class="container-fluid">
                        <div class="container">
                            <div class="row">
                              <div class="col">
                               {{ $balanca->empresa }}
                              </div>
                              <div class="col">
                                Veículo:  {{ $balanca->placa }}
                               </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Pesagem/Vazio: {{ $balanca->pesovazio}} Kg
                                </div>
                                <div class="col">
                                    @if ($balanca->pesocheio == 0)
                                    Carregamento: não realizado
                                    @else
                                    Carregado: {{ $balanca->pesocheio }} Kg
                                    @endif
                                 </div>
                            </div>
                            <div class="row">
                                <div class="col">

                                </div>
                                <div class="col">

                                 </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <a href="/dashboard/balancas/{{ $balanca->id}}" class="btn btn-primary">Visualizar</a>
                                </div>
                                <div class="col">
                                    <form action="/dashboard/balancas/{{ $balanca->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon>Apagar</button>
                                    </form>
                                 </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                              <div class="col"></div>
                              <div class="col"></div>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <hr>
                </div>
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

