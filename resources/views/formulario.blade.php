<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="bootstrap/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <title>Formulário</title>
    <style>
        body {
            background-color: #2462B9;
        }

        .color-bg {
            background-color: #E4EFFF;
        }

        .container {
            color: #12458D;
        }

        .required {
            color: red;
        }

        fieldset {
            border: 1px solid #999;
            padding: 10px;
            /* controla a distancia entre os elementos e a borda */
            margin: 15px;
            /* margem para alinhar o fieldset com o restante do grid */
        }

        legend {
            display: inline;
            width: auto;
            border: 0;
            padding: 10px;
        }

        .file-upload {
            background-color: #ffffff;
            width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        /* BUTTON */
        .file-upload-btn {
            width: 100%;
            margin: 0;
            color: #fff;
            background: #1FB264;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #15824B;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .file-upload-btn:hover {
            background: #1AA059;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .file-upload-btn:active {
            border: 0;
            transition: all .2s ease;
        }

        /* PLACEHOLDER */
        .file-upload-preview {
            display: none;
            text-align: center;
        }

        .file-upload-input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
            cursor: pointer;
        }

        .file-upload-placeholder {
            margin-top: 20px;
            border: 4px dashed #1FB264;
            position: relative;
        }

        .image-dropping,
        .file-upload-placeholder:hover {
            background-color: #1FB264;
            border: 4px dashed #fff;
        }

        .drag-text {
            text-align: center;
        }

        .drag-text h3 {
            font-weight: 100;
            text-transform: uppercase;
            color: #15824B;
            padding: 60px 0;
        }

        /* PREVIEW */
        .file-upload-image {
            max-height: 200px;
            max-width: 200px;
            margin: auto;
            padding: 20px;
        }

        /* REMOVE */
        .file-upload-remove {
            padding: 0 15px 15px 15px;
            color: #222;
        }

        .remove-image {
            width: 200px;
            margin: 0;
            color: #fff;
            background: #cd4535;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #b02818;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .remove-image:hover {
            background: #c13b2a;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .remove-image:active {
            border: 0;
            transition: all .2s ease;
        }
    </style>
</head>

<body>
    <div class="container pb-4 color-bg">
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
                        <input class="form-check-input @error('radio') is-invalid @enderror" type="radio" name="tipo"
                            id="inlineRadio1" value="defesaprevia">
                        <label class="form-check-label" for="inlineRadio1">DEFESA PRÉVIA DE AUTUAÇÃO (CDP)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('radio') is-invalid @enderror" type="radio" name="tipo"
                            id="inlineRadio2" value="jari">
                        <label class="form-check-label" for="inlineRadio2">RECURSO DE INFRAÇÃO (JARI)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('radio') is-invalid @enderror" type="radio" name="tipo"
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
                        <label for="auto" class="form-label">Auto(s)</label>
                        <span class="required">*</span>
                        <div class="input-group mb-3">
                            <div class="col-md-8" id="formulario">
                                <input type="text" name="auto[]" id="auto"
                                    class="form-control @error('auto.*') is-invalid @enderror"
                                    placeholder="A 000000-0000" aria-label="Recipient's username"
                                    aria-describedby="button-addon2">
                            </div>
                            <div class="mb-3 col-md-12">
                                <button class="btn btn-primary" type="button" id="add-campo">Adicionar mais
                                    autos</button>
                            </div>
                            @error('auto.*')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
                        name="fato" rows="10">{{ old('fato') }}</textarea>
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
