<div id="full-page-loader" class="full-page-loader">
    <!-- Puedes ajustar la clase según la implementación de spinners de Tabler.io -->
    <div class="spinner"></div>
</div>
<div id="content">
@extends('tablar::page')

@section('content')
    <script src="./dist/js/demo-theme.min.js?1695847769"></script>
    <div class="page">
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Vista
                </div>
                <h2 class="page-title" style="font-size: 30px;">
                  Dashboard
                </h2>
              </div>
            </div>
          </div>
        </div>

        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-md-4">
                    <div class="card">
                        <div class="row row-0">
                          <div class="col-3 d-flex align-items-center justify-content-center">
                            <img src="{{asset('assets/clientes.png')}}" class="rounded-start" alt="Shape of You" width="60" height="60">
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-center">
                            <div class="card-body">
                                <div class="h1 row row-0">Clientes</div>
                            </div>
                          </div>
                          <div class="col-3 d-flex align-items-center justify-content-center">
                            <div class="card-body">
                                <div class="h1 row row-0">
                                    <?php
                                        $totalClientes = App\Models\Cliente::count();
                                        echo $totalClientes;
                                    ?>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                        <div class="row row-0">
                          <div class="col-3 d-flex align-items-center justify-content-center">
                            <img src="{{asset('assets/proyecto.png')}}" class="rounded-start" alt="Shape of You" width="70" height="60">
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-center">
                            <div class="card-body">
                                <div class="h1 row row-0">Proyectos</div>
                            </div>
                          </div>
                          <div class="col-3 d-flex align-items-center justify-content-center">
                            <div class="card-body">
                                <div class="h1 row row-0">
                                    <?php
                                        $totalProyectos = App\Models\Proyecto::count();
                                        echo $totalProyectos;
                                    ?>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                        <div class="row row-0">
                          <div class="col-3 d-flex align-items-center justify-content-center">
                            <img src="{{asset('assets/cotizacion.png')}}" class="rounded-start" alt="Shape of You" width="60" height="60">
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-center">
                            <div class="card-body">
                                <div class="h1 row row-0">Cotizaciones</div>
                            </div>
                          </div>
                          <div class="col-3 d-flex align-items-center justify-content-center">
                            <div class="card-body">
                                <div class="h1 row row-0">
                                    <?php
                                        $totalCotizaciones = App\Models\Cotizacione::count();
                                        echo $totalCotizaciones;
                                    ?>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
              <div class="col-12">
                <div class="row row-cards">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row row-0">
                              <div class="col-3 d-flex align-items-center justify-content-center">
                                <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-businessplan" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6m-5 0a5 3 0 1 0 10 0a5 3 0 1 0 -10 0" /><path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4" /><path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4" /><path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4" /><path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M5 15v1m0 -8v1" /></svg>
                                </span>
                              </div>
                              <div class="col-2 d-flex align-items-center justify-content-center">
                                <div class="card-body">
                                    <div class="h3 row row-0">Monto</div>
                                </div>
                              </div>
                              <div class="col-7 d-flex align-items-center justify-content-center">
                                <div class="card-body">
                                    <div class="h4 row row-0">
                                        $<?php
                                            // Obtener la suma del campo "monto" de la tabla "pagos"
                                            $totalMontoPagos = App\Models\Pago::sum('monto');
                                            echo $totalMontoPagos;
                                        ?> MXN
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="card">
                            <div class="row row-0">
                              <div class="col-3 d-flex align-items-center justify-content-center">
                                <span class="bg-red text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14.8 9a2 2 0 0 0 -1.8 -1h-1m-2.82 1.171a2 2 0 0 0 1.82 2.829h1m2.824 2.822a2 2 0 0 1 -1.824 1.178h-2a2 2 0 0 1 -1.8 -1" /><path d="M20.042 16.045a9 9 0 0 0 -12.087 -12.087m-2.318 1.677a9 9 0 1 0 12.725 12.73" /><path d="M12 6v2m0 8v2" /><path d="M3 3l18 18" /></svg>
                                </span>
                              </div>
                              <div class="col-2 d-flex align-items-center justify-content-center">
                                <div class="card-body">
                                    <div class="h3 row row-0">Gastos</div>
                                </div>
                              </div>
                              <div class="col-7 d-flex align-items-center justify-content-center">
                                <div class="card-body">
                                    <div class="h4 row row-0">
                                        $<?php
                                            // Obtener la suma del campo "monto" de la tabla "pagos"
                                            $totalGastoPagos = App\Models\Pago::sum('gastosingreso');
                                            echo $totalGastoPagos;
                                        ?> MXN
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="card">
                            <div class="row row-0">
                              <div class="col-3 d-flex align-items-center justify-content-center">
                                <span class="bg-flickr text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pig-money" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 11v.01" /><path d="M5.173 8.378a3 3 0 1 1 4.656 -1.377" /><path d="M16 4v3.803a6.019 6.019 0 0 1 2.658 3.197h1.341a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-1.342c-.336 .95 -.907 1.8 -1.658 2.473v2.027a1.5 1.5 0 0 1 -3 0v-.583a6.04 6.04 0 0 1 -1 .083h-4a6.04 6.04 0 0 1 -1 -.083v.583a1.5 1.5 0 0 1 -3 0v-2l0 -.027a6 6 0 0 1 4 -10.473h2.5l4.5 -3h0z" /></svg>
                                </span>
                              </div>
                              <div class="col-2 d-flex align-items-center justify-content-center">
                                <div class="card-body">
                                    <div class="h3 row row-0">Diezmo</div>
                                </div>
                              </div>
                              <div class="col-7 d-flex align-items-center justify-content-center">
                                <div class="card-body">
                                    <div class="h4 row row-0">
                                        $<?php
                                            // Obtener la suma del campo "monto" de la tabla "pagos"
                                            $totalDiezmoPagos = App\Models\Pago::sum('diezmo');
                                            echo $totalDiezmoPagos;
                                        ?> MXN
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="card">
                            <div class="row row-0">
                              <div class="col-3 d-flex align-items-center justify-content-center">
                                <span class="bg-rss text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coins" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3z" /><path d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4" /><path d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598z" /><path d="M3 6v10c0 .888 .772 1.45 2 2" /><path d="M3 11c0 .888 .772 1.45 2 2" /></svg>
                                </span>
                               </div>
                              <div class="col-2 d-flex align-items-center justify-content-center">
                                <div class="card-body">
                                    <div class="h3 row row-0">Libre</div>
                                </div>
                              </div>
                              <div class="col-7 d-flex align-items-center justify-content-center">
                                <div class="card-body">
                                    <div class="h4 row row-0">
                                        $<?php
                                            // Obtener la suma del campo "monto" de la tabla "pagos"
                                            $totalLibrePagos = App\Models\Pago::sum('libre');
                                            echo $totalLibrePagos;
                                        ?> MXN
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <h3 class="card-title">Proyectos</h3>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="card">
                            <div class="card-body">
                              <div id="chart" class="chart-lg"></div>
                            </div>
                          </div>
                          <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
                          <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var options = {
                                series: [{
                                name: 'Desarrollo Web',
                                data: [
                                    {!! isset($serviciosProyectosStartup['Desarrollo web']) ? $serviciosProyectosStartup['Desarrollo web'] : 0 !!},
                                    {!! isset($serviciosProyectosEmpresarial['Desarrollo web']) ? $serviciosProyectosEmpresarial['Desarrollo web'] : 0 !!},
                                    {!! isset($serviciosProyectosCorporativo['Desarrollo web']) ? $serviciosProyectosCorporativo['Desarrollo web'] : 0 !!},
                                    {!! isset($serviciosProyectosEscalable['Desarrollo web']) ? $serviciosProyectosEscalable['Desarrollo web'] : 0 !!}
                                ]
                                }, {
                                name: 'Desarrollo Digital',
                                data: [
                                    {!! isset($serviciosProyectosStartup['Diseño digital']) ? $serviciosProyectosStartup['Diseño digital'] : 0 !!},
                                    {!! isset($serviciosProyectosEmpresarial['Diseño digital']) ? $serviciosProyectosEmpresarial['Diseño digital'] : 0 !!},
                                    {!! isset($serviciosProyectosCorporativo['Diseño digital']) ? $serviciosProyectosCorporativo['Diseño digital'] : 0 !!},
                                    {!! isset($serviciosProyectosEscalable['Diseño digital']) ? $serviciosProyectosEscalable['Diseño digital'] : 0 !!}
                                ]
                                }, {
                                name: 'E-commerce',
                                data: [
                                    {!! isset($serviciosProyectosStartup['E-commerce']) ? $serviciosProyectosStartup['E-commerce'] : 0 !!},
                                    {!! isset($serviciosProyectosEmpresarial['E-commerce']) ? $serviciosProyectosEmpresarial['E-commerce'] : 0 !!},
                                    {!! isset($serviciosProyectosCorporativo['E-commerce']) ? $serviciosProyectosCorporativo['E-commerce'] : 0 !!},
                                    {!! isset($serviciosProyectosEscalable['E-commerce']) ? $serviciosProyectosEscalable['E-commerce'] : 0 !!}
                                ]
                                }, {
                                name: 'Marketing Digital',
                                data: [
                                    {!! isset($serviciosProyectosStartup['Marketing digital']) ? $serviciosProyectosStartup['Marketing digital'] : 0 !!},
                                    {!! isset($serviciosProyectosEmpresarial['Marketing digital']) ? $serviciosProyectosEmpresarial['Marketing digital'] : 0 !!},
                                    {!! isset($serviciosProyectosCorporativo['Marketing digital']) ? $serviciosProyectosCorporativo['Marketing digital'] : 0 !!},
                                    {!! isset($serviciosProyectosEscalable['Marketing digital']) ? $serviciosProyectosEscalable['Marketing digital'] : 0 !!}
                                ]
                                }, {
                                name: 'Desarrollo de Software',
                                data: [
                                    {!! isset($serviciosProyectosStartup['Desarrollo de Software']) ? $serviciosProyectosStartup['Desarrollo de Software'] : 0 !!},
                                    {!! isset($serviciosProyectosEmpresarial['Desarrollo de Software']) ? $serviciosProyectosEmpresarial['Desarrollo de Software'] : 0 !!},
                                    {!! isset($serviciosProyectosCorporativo['Desarrollo de Software']) ? $serviciosProyectosCorporativo['Desarrollo de Software'] : 0 !!},
                                    {!! isset($serviciosProyectosEscalable['Desarrollo de Software']) ? $serviciosProyectosEscalable['Desarrollo de Software'] : 0 !!}
                                ]
                                },{
                                name: 'Aplicaciones Móviles',
                                data: [
                                    {!! isset($serviciosProyectosStartup['Aplicaciones Móviles']) ? $serviciosProyectosStartup['Aplicaciones Móviles'] : 0 !!},
                                    {!! isset($serviciosProyectosEmpresarial['Aplicaciones Móviles']) ? $serviciosProyectosEmpresarial['Aplicaciones Móviles'] : 0 !!},
                                    {!! isset($serviciosProyectosCorporativo['Aplicaciones Móviles']) ? $serviciosProyectosCorporativo['Aplicaciones Móviles'] : 0 !!},
                                    {!! isset($serviciosProyectosEscalable['Aplicaciones Móviles']) ? $serviciosProyectosEscalable['Aplicaciones Móviles'] : 0 !!}
                                ]
                                }],
                                chart: {
                                type: 'bar',
                                height: 350,
                                stacked: true,
                                },
                                plotOptions: {
                                bar: {
                                    horizontal: true,
                                    dataLabels: {
                                    total: {
                                        enabled: true,
                                        offsetX: 0,
                                        style: {
                                        fontSize: '13px',
                                        fontWeight: 900
                                        }
                                    }
                                    }
                                },
                                },
                                stroke: {
                                width: 1,
                                colors: ['#fff']
                                },
                                title: {
                                text: 'Cantidad de tipos de Proyecto'
                                },
                                xaxis: {
                                categories: ['Startup', 'Empresarial', 'Corporativo', 'Escalable'],
                                labels: {
                                    formatter: function (val) {
                                    return val
                                    }
                                }
                                },
                                yaxis: {
                                title: {
                                    text: undefined
                                },
                                },
                                tooltip: {
                                y: {
                                    formatter: function (val) {
                                    return val + " proyec."
                                    }
                                }
                                },
                                fill: {
                                opacity: 1
                                },
                                legend: {
                                position: 'top',
                                horizontalAlign: 'left',
                                offsetX: 40
                                }
                                };

                                var chart = new ApexCharts(document.querySelector("#chart"), options);
                                chart.render();
                            });
                            </script>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Startup</h3>
                        <div class="card-body">
                            <div id="chart-demo-pie" class="chart-lg"></div>
                        </div>
                      <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
                      <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
                                chart: {
                                    type: "donut",
                                    fontFamily: 'inherit',
                                    height: 240,
                                    sparkline: {
                                        enabled: false
                                    },
                                    animations: {
                                        enabled: true
                                    },
                                },
                                fill: {
                                    opacity: 1,
                                },
                                series: Object.values({!! json_encode($serviciosProyectosStartup) !!}),
                                labels: Object.keys({!! json_encode($serviciosProyectosStartup) !!}),
                                tooltip: {
                                    theme: 'dark'
                                },
                                grid: {
                                    strokeDashArray: 4,
                                },
                                colors: [
                                    // Color personalizado para el primer servicio
                                    '#0a4e9b',  // Reemplaza esto con el color que desees
                                    // Colores según la cantidad de servicios (si hay más de uno)
                                    @for ($i = 1; $i < count($serviciosProyectosStartup); $i++)
                                        tabler.getColor("primary", {{ $i / count($serviciosProyectosStartup) }})
                                        @if ($i < count($serviciosProyectosStartup) - 1),
                                            @endif
                                    @endfor
                                ],
                                legend: {
                                    show: true,
                                    position: 'bottom',
                                    offsetY: 0,
                                    markers: {
                                        width: 10,
                                        height: 10,
                                        radius: 100,
                                    },
                                    itemMargin: {
                                        horizontal: 0,
                                        vertical: 0
                                    },
                                },
                                tooltip: {
                                    fillSeriesColor: false
                                },
                            })).render();
                        });
                    </script>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Empresarial</h3>
                        <div class="card-body">
                            <div id="chart-demo-pie-empresarial" class="chart-lg"></div>
                        </div>

                      <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
                      <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie-empresarial'), {
                                chart: {
                                    type: "donut",
                                    fontFamily: 'inherit',
                                    height: 240,
                                    sparkline: {
                                        enabled: false
                                    },
                                    animations: {
                                        enabled: true
                                    },
                                },
                                fill: {
                                    opacity: 1,
                                },
                                series: Object.values({!! json_encode($serviciosProyectosEmpresarial) !!}),
                                labels: Object.keys({!! json_encode($serviciosProyectosEmpresarial) !!}),
                                tooltip: {
                                    theme: 'dark'
                                },
                                grid: {
                                    strokeDashArray: 4,
                                },
                                colors: [
                                    // Color personalizado para el primer servicio
                                    '#0a4e9b',  // Reemplaza esto con el color que desees
                                    // Colores según la cantidad de servicios (si hay más de uno)
                                    @for ($i = 1; $i < count($serviciosProyectosEmpresarial); $i++)
                                        tabler.getColor("primary", {{ $i / count($serviciosProyectosEmpresarial) }})
                                        @if ($i < count($serviciosProyectosEmpresarial) - 1),
                                            @endif
                                    @endfor
                                ],
                                legend: {
                                    show: true,
                                    position: 'bottom',
                                    offsetY: 0,
                                    markers: {
                                        width: 10,
                                        height: 10,
                                        radius: 100,
                                    },
                                    itemMargin: {
                                        horizontal: 0,
                                        vertical: 0
                                    },
                                },
                                tooltip: {
                                    fillSeriesColor: false
                                },
                            })).render();
                        });
                    </script>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Corporativo</h3>
                        <div class="card-body">
                            <div id="chart-demo-pie-corporativo" class="chart-lg"></div>
                        </div>

                      <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
                      <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie-corporativo'), {
                                chart: {
                                    type: "donut",
                                    fontFamily: 'inherit',
                                    height: 240,
                                    sparkline: {
                                        enabled: false
                                    },
                                    animations: {
                                        enabled: true
                                    },
                                },
                                fill: {
                                    opacity: 1,
                                },
                                series: Object.values({!! json_encode($serviciosProyectosCorporativo) !!}),
                                labels: Object.keys({!! json_encode($serviciosProyectosCorporativo) !!}),
                                tooltip: {
                                    theme: 'dark'
                                },
                                grid: {
                                    strokeDashArray: 4,
                                },
                                colors: [
                                    // Color personalizado para el primer servicio
                                    '#0a4e9b',  // Reemplaza esto con el color que desees
                                    // Colores según la cantidad de servicios (si hay más de uno)
                                    @for ($i = 1; $i < count($serviciosProyectosCorporativo); $i++)
                                        tabler.getColor("primary", {{ $i / count($serviciosProyectosCorporativo) }})
                                        @if ($i < count($serviciosProyectosCorporativo) - 1),
                                            @endif
                                    @endfor
                                ],
                                legend: {
                                    show: true,
                                    position: 'bottom',
                                    offsetY: 0,
                                    markers: {
                                        width: 10,
                                        height: 10,
                                        radius: 100,
                                    },
                                    itemMargin: {
                                        horizontal: 0,
                                        vertical: 0
                                    },
                                },
                                tooltip: {
                                    fillSeriesColor: false
                                },
                            })).render();
                        });
                    </script>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Escalable</h3>
                        <div class="card-body">
                            <div id="chart-demo-pie-escalable" class="chart-lg"></div>
                        </div>

                      <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
                      <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie-escalable'), {
                                chart: {
                                    type: "donut",
                                    fontFamily: 'inherit',
                                    height: 240,
                                    sparkline: {
                                        enabled: false
                                    },
                                    animations: {
                                        enabled: true
                                    },
                                },
                                fill: {
                                    opacity: 1,
                                },
                                series: Object.values({!! json_encode($serviciosProyectosEscalable) !!}),
                                labels: Object.keys({!! json_encode($serviciosProyectosEscalable) !!}),
                                tooltip: {
                                    theme: 'dark'
                                },
                                grid: {
                                    strokeDashArray: 4,
                                },
                                colors: [
                                    // Color personalizado para el primer servicio
                                    '#0a4e9b',  // Reemplaza esto con el color que desees
                                    // Colores según la cantidad de servicios (si hay más de uno)
                                    @for ($i = 1; $i < count($serviciosProyectosEscalable); $i++)
                                        tabler.getColor("primary", {{ $i / count($serviciosProyectosEscalable) }})
                                        @if ($i < count($serviciosProyectosEscalable) - 1),
                                            @endif
                                    @endfor
                                ],
                                legend: {
                                    show: true,
                                    position: 'bottom',
                                    offsetY: 0,
                                    markers: {
                                        width: 10,
                                        height: 10,
                                        radius: 100,
                                    },
                                    itemMargin: {
                                        horizontal: 0,
                                        vertical: 0
                                    },
                                },
                                tooltip: {
                                    fillSeriesColor: false
                                },
                            })).render();
                        });
                    </script>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <script src="./dist/libs/apexcharts/dist/apexcharts.min.js?1695847769" defer=""></script>
    <script src="./dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1695847769" defer=""></script>
    <script src="./dist/libs/jsvectormap/dist/maps/world.js?1695847769" defer=""></script>
    <script src="./dist/libs/jsvectormap/dist/maps/world-merc.js?1695847769" defer=""></script>
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js?1695847769" defer=""></script>
    <script src="./dist/js/demo.min.js?1695847769" defer=""></script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
      		chart: {
      			type: "area",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: .16,
      			type: 'solid'
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "Profits",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
      		}],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20'
      		],
      		colors: [tabler.getColor("primary")],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		fill: {
      			opacity: 1,
      		},
      		stroke: {
      			width: [2, 1],
      			dashArray: [0, 3],
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "May",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 4, 46, 39, 62, 51, 35, 41, 67]
      		},{
      			name: "April",
      			data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62, 61, 27, 39, 35, 41, 27, 35, 51, 46, 62, 37, 44, 53, 41, 65, 39, 37]
      		}],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20'
      		],
      		colors: [tabler.getColor("primary"), tabler.getColor("gray-600")],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		plotOptions: {
      			bar: {
      				columnWidth: '50%',
      			}
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [{
      			name: "Profits",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
      		}],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20'
      		],
      		colors: [tabler.getColor("primary")],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 240,
      			parentHeightOffset: 0,
      			toolbar: {
      				show: false,
      			},
      			animations: {
      				enabled: false
      			},
      			stacked: true,
      		},
      		plotOptions: {
      			bar: {
      				columnWidth: '50%',
      			}
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [{
      			name: "Web",
      			data: [1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8, 6, 4, 1, 8, 24, 29, 51, 40, 47, 23, 26, 50, 26, 41, 22, 46, 47, 81, 46, 6]
      		},{
      			name: "Social",
      			data: [2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1, 5, 5, 2, 12, 4, 6, 18, 3, 5, 2, 13, 15, 20, 47, 18, 15, 11, 10, 0]
      		},{
      			name: "Other",
      			data: [2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4, 9, 1, 2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6]
      		}],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			padding: {
      				top: -20,
      				right: 0,
      				left: -4,
      				bottom: -4
      			},
      			strokeDashArray: 4,
      			xaxis: {
      				lines: {
      					show: true
      				}
      			},
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24', '2020-07-25', '2020-07-26', '2020-07-27'
      		],
      		colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("green", 0.8)],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:on
      document.addEventListener("DOMContentLoaded", function() {
      	const map = new jsVectorMap({
      		selector: '#map-world',
      		map: 'world',
      		backgroundColor: 'transparent',
      		regionStyle: {
      			initial: {
      				fill: tabler.getColor('body-bg'),
      				stroke: tabler.getColor('border-color'),
      				strokeWidth: 2,
      			}
      		},
      		zoomOnScroll: false,
      		zoomButtons: false,
      		// -------- Series --------
      		visualizeData: {
      			scale: [tabler.getColor('bg-surface'), tabler.getColor('primary')],
      			values: { "AF": 16, "AL": 11, "DZ": 158, "AO": 85, "AG": 1, "AR": 351, "AM": 8, "AU": 1219, "AT": 366, "AZ": 52, "BS": 7, "BH": 21, "BD": 105, "BB": 3, "BY": 52, "BE": 461, "BZ": 1, "BJ": 6, "BT": 1, "BO": 19, "BA": 16, "BW": 12, "BR": 2023, "BN": 11, "BG": 44, "BF": 8, "BI": 1, "KH": 11, "CM": 21, "CA": 1563, "CV": 1, "CF": 2, "TD": 7, "CL": 199, "CN": 5745, "CO": 283, "KM": 0, "CD": 12, "CG": 11, "CR": 35, "CI": 22, "HR": 59, "CY": 22, "CZ": 195, "DK": 304, "DJ": 1, "DM": 0, "DO": 50, "EC": 61, "EG": 216, "SV": 21, "GQ": 14, "ER": 2, "EE": 19, "ET": 30, "FJ": 3, "FI": 231, "FR": 2555, "GA": 12, "GM": 1, "GE": 11, "DE": 3305, "GH": 18, "GR": 305, "GD": 0, "GT": 40, "GN": 4, "GW": 0, "GY": 2, "HT": 6, "HN": 15, "HK": 226, "HU": 132, "IS": 12, "IN": 1430, "ID": 695, "IR": 337, "IQ": 84, "IE": 204, "IL": 201, "IT": 2036, "JM": 13, "JP": 5390, "JO": 27, "KZ": 129, "KE": 32, "KI": 0, "KR": 986, "KW": 117, "KG": 4, "LA": 6, "LV": 23, "LB": 39, "LS": 1, "LR": 0, "LY": 77, "LT": 35, "LU": 52, "MK": 9, "MG": 8, "MW": 5, "MY": 218, "MV": 1, "ML": 9, "MT": 7, "MR": 3, "MU": 9, "MX": 1004, "MD": 5, "MN": 5, "ME": 3, "MA": 91, "MZ": 10, "MM": 35, "NA": 11, "NP": 15, "NL": 770, "NZ": 138, "NI": 6, "NE": 5, "NG": 206, "NO": 413, "OM": 53, "PK": 174, "PA": 27, "PG": 8, "PY": 17, "PE": 153, "PH": 189, "PL": 438, "PT": 223, "QA": 126, "RO": 158, "RU": 1476, "RW": 5, "WS": 0, "ST": 0, "SA": 434, "SN": 12, "RS": 38, "SC": 0, "SL": 1, "SG": 217, "SK": 86, "SI": 46, "SB": 0, "ZA": 354, "ES": 1374, "LK": 48, "KN": 0, "LC": 1, "VC": 0, "SD": 65, "SR": 3, "SZ": 3, "SE": 444, "CH": 522, "SY": 59, "TW": 426, "TJ": 5, "TZ": 22, "TH": 312, "TL": 0, "TG": 3, "TO": 0, "TT": 21, "TN": 43, "TR": 729, "TM": 0, "UG": 17, "UA": 136, "AE": 239, "GB": 2258, "US": 4624, "UY": 40, "UZ": 37, "VU": 0, "VE": 285, "VN": 101, "YE": 30, "ZM": 15, "ZW": 5 },
      		},
      	});
      	window.addEventListener("resize", () => {
      		map.updateSize();
      	});
      });
      // @formatter:off
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-activity'), {
      		chart: {
      			type: "radialBar",
      			fontFamily: 'inherit',
      			height: 40,
      			width: 40,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		plotOptions: {
      			radialBar: {
      				hollow: {
      					margin: 0,
      					size: '75%'
      				},
      				track: {
      					margin: 0
      				},
      				dataLabels: {
      					show: false
      				}
      			}
      		},
      		colors: [tabler.getColor("blue")],
      		series: [35],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
      		chart: {
      			type: "area",
      			fontFamily: 'inherit',
      			height: 192,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: .16,
      			type: 'solid'
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "Purchases",
      			data: [3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4, 14, 30, 17, 19, 15, 14, 25, 32, 40, 55, 60, 48, 52, 70]
      		}],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20'
      		],
      		colors: [tabler.getColor("primary")],
      		legend: {
      			show: false,
      		},
      		point: {
      			show: false
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-1'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: tabler.getColor("primary"),
      			data: [17, 24, 20, 10, 5, 1, 4, 18, 13]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-2'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: tabler.getColor("primary"),
      			data: [13, 11, 19, 22, 12, 7, 14, 3, 21]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-3'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: tabler.getColor("primary"),
      			data: [10, 13, 10, 4, 17, 3, 23, 22, 19]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-4'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: tabler.getColor("primary"),
      			data: [6, 15, 13, 13, 5, 7, 17, 20, 19]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-5'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: tabler.getColor("primary"),
      			data: [2, 11, 15, 14, 21, 20, 8, 23, 18, 14]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-6'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: tabler.getColor("primary"),
      			data: [22, 12, 7, 14, 3, 21, 8, 23, 18, 14]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
@endsection
</div>
<style>
    /* Estilos del Contenedor del Spinner que abarca toda la pantalla */
#full-page-loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgb(255, 255, 255);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Asegura que esté por encima de otros elementos */
}

/* Estilos del Spinner */
.spinner {
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top: 4px solid #102b5e; /* Puedes ajustar el color según el esquema de colores de tu aplicación */
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
}

/* Animación del Spinner */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

</style>
<script>
    // Ocultar el Spinner cuando la página se carga completamente
    window.addEventListener('load', function () {
        document.getElementById('full-page-loader').style.display = 'none';
    });
</script>
