<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edital | Prefeitura de Mossoró</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <!-- Theme style -->
    <link rel="stylesheet" href="site/css/style.min.css">
    <style>
        body {
            background-color: #F4F6F9;
        }
        div.unstyledTable {
            font-family: Arial, Helvetica, sans-serif;
            border: 1px solid #000000;
            background-color: #FFFFFF;
            width: 100%;
        }

        .divTable.unstyledTable .divTableCell,
        .divTable.unstyledTable .divTableHead {
            border: 1px solid #AAAAAA;
            padding: 3px 2px;
        }

        .divTable.unstyledTable .divTableBody .divTableCell {
            font-size: 18px;
            color: #333333;
        }

        .divTable.unstyledTable .divTableRow:nth-child(even) {
            background: #D0E4F5;
        }

        .divTable.unstyledTable .divTableCell:nth-child(even) {
            background: #D0E4F5;
        }

        .divTable.unstyledTable .divTableHeading {
            background: #DDDDDD;
        }

        .divTable.unstyledTable .divTableHeading .divTableHead {
            font-weight: normal;
        }

        .unstyledTable .tableFootStyle {
            font-weight: bold;
        }
        /* DivTable.com */

        .divTable {
            display: table;
        }

        .divTableRow {
            display: table-row;
        }

        .divTableHeading {
            display: table-header-group;
        }

        .divTableCell,
        .divTableHead {
            display: table-cell;
        }

        .divTableHeading {
            display: table-header-group;
        }

        .divTableFoot {
            display: table-footer-group;
        }

        .divTableBody {
            display: table-row-group;
        }
    </style>
</head>

<body>
    <section class="content">
        <div class="container">
            <h1 class="text-center pt-4">EDITAL DE NOTIFICAÇÃO</h1>
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="divTable unstyledTable">
                                <div class="divTableHeading">
                                    <div class="divTableRow">
                                        <div class="divTableHead">#</div>
                                        <div class="divTableHead">Tipo de Notificação</div>
                                        <div class="divTableHead">Edital/Ano</div>
                                        <div class="divTableHead">JOM</div>
                                        <div class="divTableHead">Arquivo</div>
                                    </div>
                                </div>
                                <div class="divTableBody">
                                    @foreach ($editais as $key => $edital)
                                    <div class="divTableRow">

                                        <div class="divTableCell">{{ $key + 1  }}</div>
                                        <div class="divTableCell">
                                            @switch($edital->tipo)
                                                    @case('na')
                                                        Notificação de Autuação
                                                    @break
                                                    @case('np')
                                                        Notificação de Penalidade
                                                    @break
                                                    @case('np e na')
                                                        Notificação de Penalidade e Autuação
                                                    @break
                                                    @default
                                                        {{ $edital->tipo }}
                                                @endswitch
                                        </div>
                                        <div class="divTableCell"><a href="http://"></a>{{ $edital->ano }}</div>
                                        <div class="divTableCell">
                                            <a href="http://jom.prefeiturademossoro.com.br/wp-content/uploads/2021/07/622.pdf">JOM</a>
                                        </div>
                                        <div class="divTableCell">
                                            <a href="storage/{{ $edital->path_pdf }}"
                                                download="edital-ano-{{ $edital->ano }}.pdf"
                                                target="_blank">Arquivo</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="divTableFoot tableFootStyle">
                                    <div class="divTableRow">
                                        <div class="divTableCell">foot1</div>
                                        <div class="divTableCell">foot2</div>
                                        <div class="divTableCell">foot3</div>
                                        <div class="divTableCell">foot3</div>
                                        <div class="divTableCell">foot3</div>
                                    </div>
                                </div>
                            </div>
                            <table id="example2" style="text-transform: uppercase"
                                class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipo de notificação</th>
                                        <th>Edital/Ano</th>
                                        <th>JOM</th>
                                        <th>Arquivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($editais as $key => $edital)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                @switch($edital->tipo)
                                                    @case('na')
                                                        Notificação de Autuação
                                                    @break
                                                    @case('np')
                                                        Notificação de Penalidade
                                                    @break
                                                    @case('np e na')
                                                        Notificação de Penalidade e Autuação
                                                    @break
                                                    @default
                                                        {{ $edital->tipo }}
                                                @endswitch

                                            </td>
                                            <td><a href="http://"></a>{{ $edital->ano }}</td>
                                            <td>
                                                <a href="http://jom.prefeiturademossoro.com.br/wp-content/uploads/2021/07/622.pdf">JOM</a>
                                            </td>
                                            <td>
                                                <a href="storage/{{ $edital->path_pdf }}"
                                                    download="edital-ano-{{ $edital->ano }}.pdf"
                                                    target="_blank">Arquivo</a>
                                            </td>
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
        </div>
        <!-- /.container-fluid -->
    </section>
    <div class="container">
        <h3 class="text-center">CONSULTA DE VEÍCULO</h3>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Para notificações depois de Nov/2018 </span>
                        <span class="info-box-number text-center text-muted mb-0"><a class="btn btn-info btn-flat"
                                href="https://radar.serpro.gov.br/main.html#/cidadao">SERPRO</a></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Para notificações antes de Nov/2018</span>
                        <span class="info-box-number text-center text-muted mb-0"><a class="btn btn-info btn-flat"
                                href="https://www2.detran.rn.gov.br/externo/consultarveiculo.asp">DETRAN-RN</a></span>
                    </div>
                </div>
            </div>
        <!-- Defesa box -->
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Formulário de Defesa Prévia e JARI</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <strong>Documentos Necessários (Para uso do Órgão)</strong><br>
                    <br>
                    <ul>
                        <li>
                            Cópia de documento com foto (CNH, RG, CTPS ou Passaporte) ou outro documento de identificação oficial que comprove a assinatura.
                        </li>
                        <li>
                            Cópia do documento do veículo (CRLV)*
                        </li>
                        <li>
                            Cópia da Notificação de Autuação ou Penalidade(multa)*
                        </li>
                        <li>
                            Cópia de Comprovante de Pagamento Autenticada*
                        </li>
                        <li>
                            Procuração com documento de identidade oficial do procurador, quando este for o requerente*
                        </li>
                        <li>
                            Cópia do contrato social e aditivos, no caso de pessoa jurídica*
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a class="btn btn-info btn-flat" id="click" href="#" >CLIQUE AQUI PARA PREENCHER O FORMULÁRIO</a>
                </div>
                <!-- /.card-footer-->
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Formulário de Restituição de Valores</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <br>
                    <ul>
                        OBSERVAÇÕES:
                        1. A falta dos documentos solicitados poderá ocasionar o não conhecimento do pleito, caso não seja possível comprovar a legitimidade do requerente ou autenticidade dos documentos. O requerimento deve conter a exposição dos fatos, fundamentos legais e/ou documentos que comprovem o alegado.
                        <br>2. São obrigatórios todas as informações e documentos marcados com asterisco (*).
                        <br>3. São partes legítimas para apresentar defesa ou interpor recurso: o proprietário, o condutor devidamente identificado, o embarcador e o transportador responsável pela infração ou pessoa designada por procuração. No caso de pessoa jurídica, o seu representante legal (Resolução 299/2008 do CONTRAN).
                        <br>4. A assinatura do requerente deve ser original e igual à constante no documento de identidade para comprovação da legitimidade (Resolução 619/2016 do CONTRAN).
                        <br>5. Em caso de Defesa da Autuação, o resultado será enviado ao proprietário do veículo (Resolução 619/2016 do CONTRAN).
                        <br>6. Preencher com letra legível utilizando caneta azul ou preta.


                    </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a class="btn btn-info btn-flat" id="click" href="#" >CLIQUE AQUI PARA PREENCHER O FORMULÁRIO</a>
                </div>
                <!-- /.card-footer-->
            </div>
        </div>

        <!-- Defesa box -->
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a class="btn btn-success" href="{{ url('/home') }}"
                        class="text-sm text-gray-700 underline">Painel</a>
                @else
                    {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a> --}}
                @endauth
            </div>
        @endif
    </div>
    <!-- jQuery -->
    <script src="site/js/script.min.js"></script>
    <script>
        $(function() {
            $('.select2').select2()
        });
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

        $( "#click" ).click(function() {
            alert('Ainda em construção')
        });
    </script>
</body>

</html>
