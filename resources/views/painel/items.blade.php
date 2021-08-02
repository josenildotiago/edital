@extends('layouts.dashboard')

@section('content')
@section('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
@endsection
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cadastro Itens</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Cadastro Itens Editais</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Cadastrando Itens</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    {{-- <form action="{{ route('createItem.edital') }}" method="POST">
                        @csrf
                        @method('PUT') --}}
                    <div class="card-body">
                        @foreach ($itens as $key => $item)
                            <div class="form-group">
                                <label for="exampleSelectRounded0">{{ $item->descricao }}</label>
                                <input type="text" disabled name="{{ $item->name }}" class="form-control"
                                    value="{{ $item->condicao }}" style="text-transform:uppercase"
                                    id="exampleInputPassword1" placeholder="Ex: 1979">
                                <button class="btn btn-block bg-gradient-info btn-flat"
                                    data-type="{{ $item->descricao }}" data-val_type="{{ $item->condicao }}"
                                    data-id_type="{{ $item->id }}" data-toggle="modal"
                                    data-target="#modal-default">Editar</button>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.card-body -->

                    {{-- <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div> --}}
                    {{-- </form> --}}
                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<!-- modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="label">Edição de tipos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.edital') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="type" id="label">Editar</label>
                        <input type="text" hidden class="form-control" name="id" id="id_type">
                        <input type="text" class="form-control" name="condicao" id="val_type">
                    </div>
                    <button type="submit" class="btn btn-block bg-gradient-info btn-flat" data-toggle="modal"
                        data-target="#modal-default">Editar</button>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.content -->
@section('js')
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
@endsection
@section('script')
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
        //------------------------------
        $('#modal-default').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var type = button.data('type')
            var idType = button.data('id_type')
            var valType = button.data('val_type')
            $("#label").html(type);

            var modal = $(this)
            modal.find('.modal-body #type').val(type);
            modal.find('.modal-body #id_type').val(idType);
            modal.find('.modal-body #val_type').val(valType);
        })
        //------------------------------
    </script>
@endsection

@endsection
