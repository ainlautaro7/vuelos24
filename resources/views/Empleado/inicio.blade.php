<?php use App\Http\Controllers\VueloController; ?>
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
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <!-- Estilos correspondientes al navbar -->
    <style>
        a.nav-link.inicio {
            color: #fff;
            background-color: #0d6efd;
        }

        span.k-button-text {
            align-self: center;
        }

        button.k-grid-.k-button.k-button-md.k-button-rectangle.k-rounded-md.k-button-solid.k-button-solid-base.k-icon-button {
            border: 0;
            width: auto;
            padding: 0;
            background: #6cb2eb;
            margin: 0;
        }

    </style>
</head>

<body class="inicio">

    <x-Sidebar />

    <div id="dialog" hidden>
        <button id="export" class="k-button"><span class="k-icon k-i-excel"></span>Exportar a Excel</button>
        <br><br>
        <div id="vueloDatosBasicos"></div>
        <br>
        <div id="vueloDetalleBoletos"></div>
    </div>

    <section class="mx-auto mb-5">
        <x-NavbarEmpleado section="Administrar Vuelos" />

        <div class="container mx-auto mt-5">
            <h2>Destinos más visitados</h2>
            <div id="destinosMasVisitados"></div>
            <br>
            <h2>Historial de vuelos registrados</h2>
            <div id="cantVuelosRegistrados">
            </div>
        </div>

    </section>

    {{-- GRID DESTINOS MAS VISITADOS --}}
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
            pageable: {
                pageSize: 5
            },
            height: 315
        });
    </script>

    {{-- ESPECIFIC FLY --}}
    <script>
        function openWindow(data) {
            // used to sync the exports
            var promises = [
                $.Deferred(),
                $.Deferred()
            ];

            $("#export").click(function(e) {
                // trigger export of the products grid
                $("#vueloDatosBasicos").data("kendoGrid").saveAsExcel();
                // trigger export of the orders grid
                $("#vueloDetalleBoletos").data("kendoGrid").saveAsExcel();
                // wait for both exports to finish
                $.when.apply(null, promises)
                    .then(function(vueloDatosBasicos, vueloDetalleBoletos) {

                        // create a new workbook using the sheets of the products and orders workbooks
                        var sheets = [
                            vueloDatosBasicos.sheets[0],
                            vueloDetalleBoletos.sheets[0]
                        ];

                        sheets[0].title = "Datos del vuelo";
                        sheets[1].title = "Detalles de boletos";

                        var workbook = new kendo.ooxml.Workbook({
                            sheets: sheets
                        });

                        // save the new workbook,b
                        kendo.saveAs({
                            dataURI: workbook.toDataURL(),
                            fileName: "vuelo.xlsx"
                        })
                    });
            });

            $.get(`{{ url('/gestion/reportePlazasNroVuelo') }}/${data.nroVuelo}`)
                .done(function(response) {
                    let detalleBoletos = response;

                    // DATOS BASICOS
                    $("#vueloDatosBasicos").kendoGrid({
                        selectable: "multiple cell",
                        allowCopy: true,
                        selectable: false,
                        columns: [{
                                field: "nroVuelo",
                                title: "Nro"
                            },
                            {
                                field: "origen",
                                title: "Origen"
                            },
                            {
                                field: "destino",
                                title: "Destino"
                            },
                            {
                                field: "fechaVuelo",
                                title: "Fecha del vuelo"
                            },
                            {
                                field: "horaVuelo",
                                title: "Hora del vuelo"
                            },
                            {
                                field: "estadoVuelo",
                                title: "Estado"
                            }
                        ],
                        dataSource: [],
                        excelExport: function(e) {
                            e.preventDefault();

                            promises[0].resolve(e.workbook);
                        }
                    });

                    let datosBasicos = new kendo.data.DataSource({
                        data: [{
                            nroVuelo: data.nroVuelo,
                            origen: data.origen,
                            destino: data.destino,
                            fechaVuelo: data.fechaVuelo,
                            horaVuelo: data.horaVuelo,
                            estadoVuelo: data.estadoVuelo,
                        }]
                    });
                    $("#vueloDatosBasicos").data("kendoGrid").setDataSource(datosBasicos);

                    // BOLETOS
                    $("#vueloDetalleBoletos").kendoGrid({
                        selectable: false,
                        allowCopy: true,
                        columns: [{
                                field: "nroVuelo",
                                hidden: true
                            },
                            {
                                field: "claseBoleto",
                                title: "Clase",
                            },
                            {
                                field: "boletosDisponibles",
                                title: "Registrados",
                                attributes: {
                                    style: "text-align:right"
                                }
                            },
                            {
                                field: "boletosComprados",
                                title: "Comprados",
                                attributes: {
                                    style: "text-align:right"
                                }
                            },
                            {
                                field: "boletosReservados",
                                title: "Reservados",
                                attributes: {
                                    style: "text-align:right"
                                }
                            },
                            {
                                field: "tarifaBoleto",
                                title: "Precio",
                                attributes: {
                                    style: "text-align:right"
                                },
                                format: "{0:c2}"
                            }
                        ],
                        dataSource: [],
                        excelExport: function(e) {
                            e.preventDefault();

                            promises[1].resolve(e.workbook);
                        }
                    });

                    let boletosDataSource = new kendo.data.DataSource({
                        data: detalleBoletos
                    });
                    $("#vueloDetalleBoletos").data("kendoGrid").setDataSource(boletosDataSource);

                    // WINDOW
                    $("#dialog").removeAttr("hidden");
                    $("#dialog").kendoWindow({
                        animation: {
                            open: {
                                duration: 100
                            }
                        },
                        modal: true,
                        preventScroll: true,
                        width: "80%",
                        visible: false,
                        position: {
                            top: 100, // or "100px"
                            left: "10%"
                        }
                    });
                    $("#dialog").data("kendoWindow").open();

                    $("#dialog").data("kendoWindow").center();
                    $("#dialog").data("kendoWindow").pin();
                    // $("#dialog").title("Datos del vuelo nro " + data.nroVuelo);
                });
        }
    </script>

    {{-- GRID HISTORIAL DE VUELOS --}}
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
                    attributes: {
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
                    attributes: {
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
                    attributes: {
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
                    attributes: {
                        style: "text-align:right"
                    }
                },
                {
                    command: [{
                        name: " ",
                        iconClass: "btn btn-info fas fas-solid fas-circle-info",
                        click: function(e) {
                            // prevent page scroll position change
                            e.preventDefault();
                            // e.target is the DOM element representing the button
                            var tr = $(e.target).closest("tr"); // get the current table row (tr)
                            // get the data bound to the current table row
                            var data = this.dataItem(tr);


                            openWindow(data)
                        }
                    }],
                    width: "6%",
                    attributes: {
                        style: "text-align: center"
                    }
                }
            ],
            dataSource: cantVuelosRegistrados,
            filterable: true,
            toolbar: ["excel"],
            excel: {
                allPages: true,
                fileName: "historico_vuelos_registrados.xlsx"
            },
            pageable: {
                pageSize: 10
            },
            height: 490
        });
    </script>
</body>

</html>
