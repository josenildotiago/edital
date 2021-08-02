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
                <h1>Cadastro Editais</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Cadastro Editais</li>
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
                        <h3 class="card-title">Cadastrando edital</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('create.edital') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            @foreach ($itens as $item)
                                @php
                                    $condicoes = explode('/', $item->condicao);
                                    $count = count($condicoes);
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $item->descricao }}">{{ $item->descricao }}</label>
                                    <select class="custom-select rounded-0" required name="{{ $item->name }}"
                                        id="{{ $item->descricao }}" style="text-transform: uppercase">
                                        @for ($i = 0; $i < $count; $i++)
                                            <option value="{{ $condicoes[$i] }}">{{ $condicoes[$i] }}</option>
                                        @endfor
                                    </select>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label for="exampleInputPassword1">N°</label>
                                <input type="text" name="numero" class="form-control" required id="exampleInputPassword1"
                                    placeholder="000">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">N°/Ano</label>
                                <input type="text" name="ano" class="form-control" required id="exampleInputPassword1"
                                    placeholder="Ex: 1979">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">JOM</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="jom" required class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Escolher JOM</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Enviar</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Arquivo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="path_pdf" required class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Escolher arquivo</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Enviar</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

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
    </script>
@endsection

@endsection
