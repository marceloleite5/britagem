@extends('layouts.main')

@section('title', 'Page Title')

@section('content')


    <!-- Main Content -->
    <div id="content">

        <div class="container-fluid">
            <div class="row">
                <!-- Area Chart -->

                <script>
                    function cont(){
                       var conteudo = document.getElementById('print').innerHTML;
                       tela_impressao = window.open('about:blank');
                       tela_impressao.document.write(conteudo);
                       tela_impressao.window.print();
                       tela_impressao.window.close();
                    }
                    </script>


                <div id="print" class="col-xl-8 col-lg-7">

                    <div class="card shadow mb-12">

                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <form>

                            <div class="dropdown no-arrow">

                            </div>


                          @foreach ($empresas as $empresa)
                          <table border="0" width="100%">

                            <tr>
                              <td colspan="4" align="center"><h2><b>Nota de conferência</b></h2></td>

                              <td><b> Pedido Nº {{$venda->id}}</b></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="center"><b>{{ $empresa->nome }}</b></td>
                              </tr>
                            <tr>
                              <td colspan="5">End: {{ $empresa->endereco}}</td>
                            </tr>
                            <tr>
                                <td colspan="3">CNPJ: {{ $empresa->cnpj}}</td>

                                <td colspan="2">Te.: {{ $empresa->tel}}</td>
                            </tr>
                          </table>
                            @endforeach

                        <table border="0" width="100%">
                            <tr>
                                <td colspan="5"><hr></td>
                            </tr>
                            <tr>
                              <td colspan="5">Cliente: <b>{{ $venda->cliente }}</b></td>

                            </tr>
                            <tr>
                                <td colspan="5">Endereço: {{ $venda->endereco }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">CNPJ: {{ $venda->cpfcnpj}}</td>

                                <td colspan="2">Te.: {{ $venda->tel}}</td>
                            </tr>
                          </table>

                        <table border="0" width="100%">
                          <tr>
                              <td colspan="5"><hr></td>
                          </tr>
                          <tr>
                            <td colspan="2">Data de Emissão: {{ date('d/m/Y', strtotime($venda->data)) }}</td>
                            <td colspan="3">Quantidade: {{ $venda->peso }}</td>
                          </tr>
                          <tr>
                              <td colspan="2">Forma de pagamento: {{ $venda->formadepagamento }}</td>
                              <td colspan="3">Valor Unitário: R$ {{ $venda->valor}},00</td>
                          </tr>
                          <tr>
                            <td colspan="2">Motorista: {{ $venda->motorista }}</td>
                            @if ($venda->formadepagamento == 'À vista')
                            <td colspan="3">Desconto: R$ {{ $venda->desconto}},00</td>
                            @else
                            <td colspan="3"></td>
                            @endif

                          </tr>
                          <tr>
                            <td colspan="2">Frete: R$ {{ $venda->frete }},00</td>
                            <td colspan="3">Valor Total: R$ {{ $venda->total}},00</td>
                          </tr>

                        </table>
                      </div>
                        <div class="dropdown no-arrow">
                          <div class="container">
                          </form>

                          </div>
                    </div>
                    <div class="dropdown no-arrow">
                      <div class="container">
                        <input type="button" class="btn btn-primary" onclick="cont();" value="Imprimir">
                        @if ($venda->formadepagamento == 'À vista')
                        <button type="button" class="btn btn-warning" title="Edit" data-toggle="modal" data-target="#editModal" data-id="{{ $venda->id }}" data-name="{{ $venda->cliente}}" data-mail="{{ $venda->desconto }}" data-tel="{{ $venda->total }}" data-business=""><i class="fas fa-user-edit">Desconto</i></button>
                        @else
                           
                        @endif

                    </div>
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


<!-- Modal ########################################################## -->
<script>
	$(function(){
		$('#editModal').on('show.bs.modal', function (event) {
			//atribuindo os data-name (name)
			var button = $(event.relatedTarget)
			var recipient = button.data('id')
			var recipient2 = button.data('name')
			var recipient3 = button.data('mail')
			var recipient4 = button.data('tel')
			var recipient5 = button.data('business')
			var modal = $(this)
			//insere os valores dentro dos inputs pelo id
			modal.find('.modal-title').text(recipient2)
			modal.find('#recipient-id').val(recipient)
			modal.find('#recipient-name').val(recipient2)
			modal.find('#recipient-mail').val(recipient3)
			modal.find('#recipient-tel').val(recipient4)
			modal.find('#recipient-business').val(recipient5)
		});

	});
</script>



<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/vendas/update/{{ $venda->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h1>Calculando desconto</h1>
                    Total:<input type="text" name="txtn1" id="txtn1" value="{{ $venda->total }}"> <br><br>
                    Digite o desconto:<input type="number" name="txtn2" id="txtn2"><br><br>
                    <input type="button" class="btn btn-primary" value="Calcular" onclick="descontar()">
                    <div id="res" >Resultado</div>

<script>
    function descontar() {
        var tn1 = window.document.getElementById('txtn1')
        var tn2 = window.document.getElementById('txtn2')
        var res = window.document.getElementById('res')
        var n1 = Number(tn1.value)
        var n2 = Number(tn2.value)
        var s = n1 - n2

        res.innerHTML = `Descontado ${n2} de ${n1}  Resultado: R$ <strong>${s},00</strong>
        <div class="form-group">
                        <label for="message-text" class="col-form-label">Desconto:</label>
                        <input type="text" class="form-control" id="recipient-mail" value="${n2}"  name="desconto">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Novo valor:</label>
        <input type="text" class="form-control telefone" value="${s}" id=""  name="total">

                    </div>`


    }




</script>
       <!-- <div class="form-group">
                        <input type="text" class="form-control" id="recipient-id" style="display: none">
                        <label for="message-text" class="col-form-label">Code</label>
                        <input type="text" class="form-control" id="recipient-id" readonly name="id">
                    </div>
                    <div class="form-group">

                        <label for="message-text" class="col-form-label">Cliente</label>
                        <input type="text" class="form-control" id="recipient-name"  name="cliente">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Desconto:</label>
                        <input type="text" class="form-control" id="recipient-mail"  name="desconto">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Digite o novo valor:</label>
        <input type="hidden" class="form-control telefone" value="" id=""  name="total">

                    </div>-->
                    <!--<div class="form-group">
                        <label for="message-text" class="col-form-label">Business</label>
                        <input type="text" class="form-control" id="recipient-business" name="business">
                    </div>-->


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>







@stop

