{{-- @if (Session::has('feito'))
@if (Session::get('feito') == 'true')
<script>
    window.location = "/feito";
</script>
@endif
@endif --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="bootstrap/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/styleFormulario.css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <title>Formulário</title>
</head>

<body>
    <div class="container pb-4 color-bg">
        {{-- @if (Session::has('auto'))
        <pre>
            {{ Session::get('auto') }}
        </pre>
        @endif --}}
        <h1 class="text-center pt-4">
            REQUERIMENTO DE RECURSO DE AUTUAÇÃO OU PENALIDADE / RESTITUIÇÃO DE VALORES
        </h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @include('message')
        <form action="{{ route('getForm') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <fieldset>
                <legend for="">Tipos de formulário <span class="required">*</span></legend>

                <div class="text-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('tipo') is-invalid @enderror" type="radio" name="tipo"
                            id="inlineRadio1" value="defesaprevia">
                        <label class="form-check-label" for="inlineRadio1">DEFESA PRÉVIA DE AUTUAÇÃO (CDP)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('tipo') is-invalid @enderror" type="radio" name="tipo"
                            id="inlineRadio2" value="jari">
                        <label class="form-check-label" for="inlineRadio2">RECURSO DE INFRAÇÃO (JARI)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('tipo') is-invalid @enderror" type="radio" name="tipo"
                            id="inlineRadio3" value="restituicao">
                        <label class="form-check-label" for="inlineRadio3">RESTITUIÇÃO DE VALORES</label>
                    </div>

                </div>
                <input type="text" hidden name="ip" value="{{ Request::ip() }}">
            </fieldset>
            <fieldset>
                <legend>Identificação do solicitante</legend>
                <div class="row g-3">
                    <div class="mb-3 col-md-8">
                        <label for="name" class="form-label">Nome completo</label>
                        <span class="required">*</span>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nome">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="cpf" class="form-label">CPF/CNPJ</label>
                        <span class="required">*</span>
                        <input type="text" required name="cpf" value="{{ old('cpf') }}"
                            class="form-control @error('cpf') is-invalid @enderror" id="cpf_cnpj"
                            placeholder="000.000.000-00/00.000.000/0000-00">
                        @error('cpf')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md">
                        <label for="email" class="form-label">E-mail</label>
                        <span class="required">*</span>
                        <input type="email" required value="{{ old('email') }}" name="email"
                            class="form-control @error('email') is-invalid @enderror" id="email" placeholder="E-mail">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Endereço</legend>
                <div class="row g-3">
                    <div class="mb-3 col-md-2">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" name="cep" class="form-control cep" onblur="pesquisacep(this.value);"
                            id="cep" value="{{ old('cep') }}" placeholder="00000-000">
                    </div>
                    <div class="mb-3 col-md-10">
                        <label for="rua" class="form-label">Rua</label>
                        <input type="text" name="rua" class="form-control" id="rua" value="{{ old('rua') }}"
                            placeholder="Rua">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" name="bairro" class="form-control" id="bairro" value="{{ old('bairro') }}"
                            placeholder="Bairro">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" name="cidade" class="form-control" id="cidade" value="{{ old('cidade') }}"
                            placeholder="Cidade">
                    </div>
                    <div class="mb-md-3 col">
                        <label for="numero" class="form-label">N°</label>
                        <input type="number" name="numero" class="form-control" id="numero" value="{{ old('numero') }}"
                            placeholder="000">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="uf" class="form-label">UF</label>
                        <input class="form-control" name="uf" list="datalistOptions" id="uf" value="{{ old('uf') }}"
                            placeholder="UF">
                        <datalist id="datalistOptions">
                            @foreach ($estados as $key => $estado)
                            <option value="{{ $estado->uf }}">
                                @endforeach
                        </datalist>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="tel" class="form-label">Telefone</label>
                        <input type="text" name="tel" value="{{ old('tel') }}" class="form-control" id="tel"
                            placeholder="0000000">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Identificação do veículo</legend>
                <div class="row g-3">
                    <div class="mb-3 col-md-8">
                        <label for="placa" class="form-label">Placa</label>
                        <span class="required">*</span>
                        <input type="text" name="placa" value="{{ old('placa') }}" required
                            class="form-control @error('placa') is-invalid @enderror" id="placa" placeholder="Placa">
                        @error('placa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="uf" class="form-label">UF</label>
                        <input class="form-control" name="ufveiculo" value="{{ old('ufveiculo') }}"
                            list="datalistOptions" id="uf" placeholder="UF">
                        <datalist id="datalistOptions">
                            @foreach ($estados as $key => $estado)
                            <option value="{{ $estado->uf }}">
                                @endforeach
                        </datalist>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Identificação da notificação</legend>
                <div class="row g-3">
                    <div class="mb-3 col-md-12">
                        <label for="auto" class="form-label">Auto</label>
                        <span class="required">*</span>
                        <div class="input-group mb-3">
                            <div class="col-md-8" id="formulario">
                                <input type="text" name="auto" id="auto" value="{{ old('auto') }}"
                                    class="form-control @error('auto') is-invalid @enderror" placeholder="A 000000-0000"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                @error('auto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Dos fatos <span class="required">*</span></legend>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1"
                        class="form-label">Obsevações/descrições/Declarações/fatos</label>
                    <textarea class="form-control @error('fato') is-invalid @enderror" id="exampleFormControlTextarea1"
                        name="fato" rows="10" required>{{ old('fato') }}</textarea>
                    @error('fato')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </fieldset>
            <fieldset>
                <legend>Anexar Imagens</legend>
                <div class="row g-3">
                    <div class="mb-3 col-md-12">
                        <label for="formFileMultiple" class="form-label">Fotos</label>
                        <input class="form-control" name="image[]" type="file" id="formFileMultiple" accept="image/*"
                            multiple>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Anexar Documentos</legend>
                <div class="row g-3">
                    <div class="mb-3 col-md-12">
                        <label for="formFileMultiple" class="form-label">Documentos</label>
                        <input class="form-control" name="doc[]" type="file" id="formFileMultiple"
                            accept="application/pdf" multiple>
                    </div>
                </div>
            </fieldset>
            <div class="row g-3">
                <div class="mb-3 col-md-12">
                    <button class="btn btn-block btn-primary" type="submit">Gerar Requerimento</button>
                </div>
            </div>

        </form>

    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="js/mask.js"></script>
    <script src="js/add.js"></script>

</body>

</html>