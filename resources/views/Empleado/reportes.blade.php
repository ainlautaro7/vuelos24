<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestion Vuelos 24 | Reportes</title>

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
    {{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script> --}}

    <!-- Kendo -->
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.1.301/styles/kendo.common.min.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.1.301/styles/kendo.bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
    <script src="https://kendo.cdn.telerik.com/2022.1.301/js/kendo.all.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2022.1.301/js/jszip.min.js"></script>

    <!-- Estilos correspondientes al navbar -->
    <style>
        a.nav-link.reportes {
            color: #fff;
            background-color: #0d6efd;
        }

        span.k-button-text {
            align-self: center;
        }

    </style>
</head>

<body class="reportes">

    <x-Sidebar />

    <section class="mx-auto">
        <x-NavbarEmpleado section="Administrar Vuelos" />

        <div class="container mx-auto mt-5">
            <h2>Destinos mas visitados</h2>
            <div id="destinosMasVisitados"></div>
            <br>
            <h2>cant Vuelos Registrados</h2>
            <div id="cantVuelosRegistrados"></div>
        </div>

    </section>

    <script>
        let destinosMasVisitados = {!! json_encode($destinosMasVisitados) !!};
        $("#destinosMasVisitados").kendoGrid({
            toolbar: ["excel"],
            excel: {
                allPages: true,
                fileName: "destinosMasVisitados.xlsx"
            },
            columns: [{
                    field: "destino",
                    title: "Destino",
                    attributes: {
                        "class": "table-cell k-text-left",
                        style: "font-size: 14px"
                    },
                    headerAttributes: {
                        style: "text-align:center;align-self: center;"
                    }
                },
                {
                    title: "Cantidad boletos vendidos",
                    headerAttributes: {
                        style: "text-align:center;align-self: center;"
                    },
                    columns: [{
                            field: "cantBoletosTurista",
                            title: "Turista",
                            attributes: {
                                "class": "table-cell k-text-right",
                                style: "font-size: 14px"
                            },
                            headerAttributes: {
                                style: "text-align:center;align-self: center;"
                            }
                        },
                        {
                            field: "cantBoletosPrimera",
                            title: "Primera",
                            attributes: {
                                "class": "table-cell k-text-right",
                                style: "font-size: 14px"
                            },
                            headerAttributes: {
                                style: "text-align:center;align-self: center;"
                            }
                        },
                        {
                            field: "cantBoletosBusiness",
                            title: "Business",
                            attributes: {
                                "class": "table-cell k-text-right",
                                style: "font-size: 14px"
                            },
                            headerAttributes: {
                                style: "text-align:center;align-self: center;"
                            }
                        },
                        {
                            field: "totalVendidos",
                            title: "Total",
                            attributes: {
                                "class": "table-cell k-text-right",
                                style: "font-size: 14px"
                            },
                            headerAttributes: {
                                style: "text-align:center;align-self: center;"
                            }
                        }
                    ]
                }
            ], // two columns bound to the "name" and "age" fields
            dataSource: destinosMasVisitados,
        });
    </script>

    <script>
        let cantVuelosRegistrados = {!! json_encode($cantVuelosRegistrados) !!};
        $("#cantVuelosRegistrados").kendoGrid({
            columns: [{
                    field: "nroVuelo",
                    title: "Nro. vuelo",
                    headerAttributes: {
                        style: "text-align:center;align-self: center;"
                    },
                    filterable: {
                        multi: true,
                        search: true
                    },
                    attributes:{
                        style: "text-align:right"
                    }
                },
                {
                    field: "origen",
                    title: "Origen",
                    headerAttributes: {
                        style: "text-align:center;align-self: center;"
                    },
                    filterable: {
                        multi: true,
                        search: true
                    }
                },
                {
                    field: "destino",
                    title: "Destino",
                    headerAttributes: {
                        style: "text-align:center;align-self: center;"
                    },
                    filterable: {
                        multi: true,
                        search: true
                    }
                },
                {
                    field: "fechaVuelo",
                    title: "Fecha vuelo",
                    headerAttributes: {
                        style: "text-align:center;align-self: center;"
                    },
                    filterable: false,
                    attributes:{
                        style: "text-align:center"
                    }
                },
                {
                    field: "horaVuelo",
                    title: "Hora vuelo",
                    headerAttributes: {
                        style: "text-align:center;align-self: center;"
                    },
                    filterable: false,
                    attributes:{
                        style: "text-align:center"
                    }
                },
                {
                    field: "planVuelo",
                    title: "Plan vuelo",
                    headerAttributes: {
                        style: "text-align:center;align-self: center;"
                    },
                    hidden: true
                },
                {
                    field: "estadoVuelo",
                    title: "Estado vuelo",
                    headerAttributes: {
                        style: "text-align:center;align-self: center;"
                    },
                    filterable: {
                        multi: true,
                        search: true
                    }
                },
                {
                    field: "cantidadBoletos",
                    title: "Cantidad boletos",
                    headerAttributes: {
                        style: "text-align:center;align-self: center;"
                    },
                    filterable: false,
                    attributes:{
                        style: "text-align:right"
                    }
                }
            ],
            dataSource: cantVuelosRegistrados,
            filterable: true,
            toolbar: ["excel"],
            excel: {
                allPages: true,
                fileName: "cantVuelosRegistrados.xlsx"
            }
        });
    </script>
</body>

</html>
