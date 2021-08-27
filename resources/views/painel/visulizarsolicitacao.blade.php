@extends('layouts.dashboard')

@section('content')
@section('css')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
@endsection
<section class="content">
    <h1 class="text-center pt-4">VISUALIZAR SOLICITAÇÃO DE DEFESA</h1>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" style="text-transform: uppercase" class="table table-bordered table-hover">
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
                            @foreach ($solicitacoes as $key => $solicitacao)
                            <tr>
                                <td>{{ $solicitacao->id }}</td>
                                <td>{{ $solicitacao->name }}</td>
                                <td>{{ $solicitacao->placa }}</td>
                                <td>{{ $solicitacao->cpf }}</td>
                                <td>{{ $solicitacao->auto }}</td>
                                <td>
                                    <a class="btn btn-info btn-block btn-sm"
                                        href="{{ url('visualizarCompleto', $solicitacao->id ) }}">Visualizar
                                        completo</a>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- /.container-fluid -->
</section>
@section('js')
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
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