<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vuelos24</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <!-- Styles propios -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://docs.telerik.com/kendo-ui/assets/jquery.js"></script>

    <!-- Kendo -->
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.1.301/styles/kendo.common.min.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.1.301/styles/kendo.bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
    <script src="https://kendo.cdn.telerik.com/2022.1.301/js/kendo.all.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2022.1.301/js/jszip.min.js"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        input {
            border: none;
            background: transparent;
            cursor: default;
            color: black;
            font-weight: 700;
            width: 100%;
        }

        input:focus-visible {
            outline: none;
        }

    </style>
</head>

<body class="inicioCliente">

    <!-- navbar -->
    @include('components.cliente.navbar')

    <h1 class="text-center mt-5">Mis Vuelos</h1>

    <div class="container mx-auto mt-5">

        {!! session()->forget('cantAdultos') !!}
        {!! session()->forget('tarifaAdultos') !!}
        {!! session()->forget('cantMenores') !!}
        {!! session()->forget('tarifaMenores') !!}
        {!! session()->forget('cantBebes') !!}
        {!! session()->forget('tarifaBebes') !!}
        {!! session()->forget('total') !!}
        {!! session()->forget('url') !!}

        @if (session()->has('message'))
            <div class="alert alert-success text-start mt-2" role="alert">
                <div>{{ session('message') }}</div>
                {!! session()->forget('message') !!}
            </div>
        @endif

        <div id="tickets"></div>
    </div>

    {{-- SCRIPTS --}}

    {{-- GRID DESTINOS MAS VISITADOS --}}
    <script>
        let destinosMasVisitados = {!! json_encode($boletos) !!};
        $("#tickets").kendoGrid({
            columns: [{
                field: "nroVuelo",
                hidden: true,
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "nroBoleto",
                hidden: true,
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "codCliente",
                hidden: true,
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "origenVuelo",
                title: "Origen",
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "destinoVuelo",
                title: "Destino",
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "fechaVuelo",
                title: "Fecha",
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "horaVuelo",
                title: "Hora",
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "apellidoPasajero",
                title: "Apellido",
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "nombrePasajero",
                title: "Nombre",
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "documentoPasajero",
                title: "Documento",
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "claseBoleto",
                title: "Clase",
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "tarifaBoleto",
                title: "Tarifa",
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "tipoBoleto",
                title: "Clase",
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "estadoBoleto",
                title: "Estado",
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                field: "fechaTransaccion",
                hidden: true,
                attributes: {
                    "class": "table-cell k-text-left",
                    style: "font-size: 14px"
                },
                headerAttributes: {
                    style: "text-align:center;align-self: center;"
                }
            }, {
                title: "Acciones",
                attributes: {
                    style: "display: flex;justify-content: space-between;"
                },
                template: function(dataItem) {
                    if(dataItem.estadoBoleto == "reservado"){
                        return '<form action="{{ route("PDFs.compraReserva") }}" method="get">' +
                            '<input type="hidden" name="nroVuelo" value="'+dataItem.nroVuelo+'">' +
                            '<input type="hidden" name="tipoBoleto" value="'+dataItem.tipoBoleto+'">' +

                            '<input type="hidden" name="origenVuelo" value="'+dataItem.origenVuelo+'">' +
                            '<input type="hidden" name="destinoVuelo" value="'+dataItem.destinoVuelo+'">' +
                            
                            '<input type="hidden" name="fechaVuelo" value="'+dataItem.fechaVuelo+'">' +
                            '<input type="hidden" name="horaVuelo" value="'+dataItem.horaVuelo+'">' +
                            '<input type="hidden" name="apellidoPasajero" value="'+dataItem.apellidoPasajero+'">' +
                            '<input type="hidden" name="nombrePasajero" value="'+dataItem.nombrePasajero+'">' +
                            '<input type="hidden" name="documentoPasajero" value="'+dataItem.documentoPasajero+'">' +
                            '<input type="hidden" name="claseBoleto" value="'+dataItem.claseBoleto+'">' +
                            '<input type="hidden" name="tarifaBoleto" value="'+dataItem.tarifaBoleto+'">' +
                            '<input type="hidden" name="estadoBoleto" value="'+dataItem.estadoBoleto+'">' +
                            '<button class="btn btn-info btn-sm k-icon k-i-paste-plain-text"></button>' +
                        '</form>'+
                        '<form action="{{ route("cliente.reserva") }}" method="POST">'+
                            '@csrf'+
                            '<input type="hidden" name="nroVuelo" value="'+dataItem.nroVuelo+'">'+
                            '<input type="hidden" name="codCliente" value="{{ DB::table("cliente")->where("idUsuario", auth()->user()->id)->value("codCliente") }}">'+
                            '<input type="hidden" name="cantPasajeros" value="1">'+
                            '<input type="hidden" name="tipoTransaccion" value="compra">'+
                            '<input type="hidden" name="tipoBoleto" value="'+dataItem.tipoBoleto+'">'+
                            '<input type="hidden" name="url" value="perfil">'+
                            '<input readonly size="" type="hidden" name="origenVuelo" value="'+dataItem.origenVuelo+'">'+
                            '<input readonly size="" type="hidden" name="destinoVuelo" value="'+dataItem.destinoVuelo+'">'+
                            '<input readonly size="" type="hidden" name="fechaVuelo" value="'+dataItem.fechaVuelo+'">'+
                            '<input readonly size="" type="hidden" name="horaVuelo" value="'+dataItem.horaVuelo+'">'+
                            '<input readonly size="" type="hidden" name="apellidoPasajero1" value="'+dataItem.apellidoPasajero+'">'+
                            '<input readonly size="" type="hidden" name="nombrePasajero1" value="'+dataItem.nombrePasajero+'"> '+
                            '<input readonly size="" type="hidden" name="documentoPasajero1" value="'+dataItem.documentoPasajero+'">'+
                            '<input readonly size="" type="hidden" name="claseBoleto" value="'+dataItem.claseBoleto+'">'+
                            '<input readonly size="" type="hidden" name="tarifaBoleto" value="'+dataItem.tarifaBoleto+'">'+
                            '<input readonly size="" type="hidden" name="estadoBoleto" value="'+dataItem.estadoBoleto+'">'+
                            '<button type="submit" class="btn btn-success btn-sm k-icon k-i-cart k-i-shopping-cart"></button>'+
                        '</form>';
                    }else{
                        return '<form action="{{ route("PDFs.compraReserva") }}" method="get">' +
                        '<input type="hidden" name="nroVuelo" value="'+dataItem.nroVuelo+'">' +
                        '<input type="hidden" name="tipoBoleto" value="'+dataItem.tipoBoleto+'">' +

                        '<input type="hidden" name="origenVuelo" value="'+dataItem.origenVuelo+'">' +
                        '<input type="hidden" name="destinoVuelo" value="'+dataItem.destinoVuelo+'">' +
                        
                        '<input type="hidden" name="fechaVuelo" value="'+dataItem.fechaVuelo+'">' +
                        '<input type="hidden" name="horaVuelo" value="'+dataItem.horaVuelo+'">' +
                        '<input type="hidden" name="apellidoPasajero" value="'+dataItem.apellidoPasajero+'">' +
                        '<input type="hidden" name="nombrePasajero" value="'+dataItem.nombrePasajero+'">' +
                        '<input type="hidden" name="documentoPasajero" value="'+dataItem.documentoPasajero+'">' +
                        '<input type="hidden" name="claseBoleto" value="'+dataItem.claseBoleto+'">' +
                        '<input type="hidden" name="tarifaBoleto" value="'+dataItem.tarifaBoleto+'">' +
                        '<input type="hidden" name="estadoBoleto" value="'+dataItem.estadoBoleto+'">' +
                        '<button class="btn btn-info btn-sm k-icon k-i-paste-plain-text"></button>' +
                        '</form>'
                    };
                }
            }],
            dataSource: destinosMasVisitados,
            pageable: {
                pageSize: 8
            },
            height: 487
        });
    </script>

</body>

</html>
