@extends('layouts.dashboard')

@section('content')
@section('css')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12 text-uppercase">
                            <h4>
                                <i class="fas fa-user"></i> {{ $invoice->name }}
                                <small class="float-right">{{ date('d/m/Y') }}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <address>
                                <strong>Endereço</strong><br>
                                Rua: {{ $invoice->rua }}<br>
                                Bairro: {{ $invoice->bairro }}<br>
                                Tel: {{ $invoice->tel }}<br>
                                Email: {{ $invoice->email }}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <address>
                                <strong>Infração</strong><br>
                                Auto n°: {{ $invoice->auto }}<br>
                                Tipo defesa: {{ mb_strtoupper($invoice->tipo) }}<br>
                                Placa: {{ mb_strtoupper($invoice->placa) }}<br>
                                Outros:
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #007612</b><br>
                            <br>
                            <b>Order ID:</b> 4F3S8J<br>
                            <b>Payment Due:</b> 2/22/2014<br>
                            <b>Account:</b> 968-34567
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <h1 class="text-center pt-4">Registros de defesa pra essa placa</h1>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="example2" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Placa</th>
                                        <th>CPF/CNPJ</th>
                                        <th>Auto</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($multas as $multa)
                                    <tr>
                                        <td>{{ $multa->id }}</td>
                                        <td>{{ $multa->name }}</td>
                                        <td>{{ $multa->placa }}</td>
                                        <td>{{ $multa->cpf }}</td>
                                        <td>{{ $multa->auto }}</td>
                                        <td>teste</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1>
                                        Descrição da defesa
                                    </h1>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <dl>
                                        <dd>{{ $invoice->fato }}</dd>
                                    </dl>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@section('js')
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
@endsection
@section('script')
<script>
    $(function() {
            bsCustomFileInput.init();
            $('#example2').DataTable({
            "language": {
                "url": "traductions/dt1.json"
            },
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
        $("#example1").DataTable({
                dom: 'Bfrtip',
                "buttons": [{
                        "extend": "copyHtml5",
                        "text": "COPIAR"
                    },
                    {
                        "extend": "pdf",
                        "text": "PDF"
                    },
                    {
                        "extend": "excelHtml5",
                        "text": "EXCEL"
                    },
                    {
                        "extend": "print",
                        "text": "IMPRIMIR"
                    }
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"],
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "language": {
                    "url": "traductions/dt1.json"
                }
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
@endsection