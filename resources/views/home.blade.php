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

                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="col">
                                <span style="width: 60px; height:60px;" class="bg-twitter text-white avatar">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-browser-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 1a1 1 0 0 1 1 -1h14a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-14a1 1 0 0 1 -1 -1z" /><path d="M4 8h16" /><path d="M8 4v4" /><path d="M9.5 14.5l1.5 1.5l3 -3" /></svg>
                                </span>
                            </div>
                            <div class="col-xl">
                                <div class="h2 mb-2 font-weight-medium">
                                  Clientes
                                </div>
                              </div>
                            <div class="ml-auto text-right">
                                <div class="h1 mb-2">75</div>
                            </div>
                        </div>
                    </div>
                </div>


              <div class="col-sm-6 col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">Proyectos</div>
                    </div>
                    <div class="d-flex align-items-baseline">
                      <div class="h1 mb-0 me-2">120</div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">Cotizaciones</div>
                    </div>
                    <div class="d-flex align-items-baseline">
                      <div class="h1 mb-3 me-2">782</div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="row row-cards">
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              132 Sales
                            </div>
                            <div class="text-secondary">
                              12 waiting payments
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              78 Orders
                            </div>
                            <div class="text-secondary">
                              32 shipped
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z"></path></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              623 Shares
                            </div>
                            <div class="text-secondary">
                              16 today
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              132 Likes
                            </div>
                            <div class="text-secondary">
                              21 today
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="row row-cards">

                  <div class="col-12">
                    <div class="card" style="height: 28rem">
                      <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                        <div class="divide-y">
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar">JL</span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Jeffie Lewzey</strong> commented on your <strong>"I'm not a witch."</strong> post.
                                </div>
                                <div class="text-secondary">yesterday</div>
                              </div>
                              <div class="col-auto align-self-center">
                                <div class="badge bg-primary"></div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  It's <strong>Mallory Hulme</strong>'s birthday. Wish him well!
                                </div>
                                <div class="text-secondary">2 days ago</div>
                              </div>
                              <div class="col-auto align-self-center">
                                <div class="badge bg-primary"></div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Dunn Slane</strong> posted <strong>"Well, what do you want?"</strong>.
                                </div>
                                <div class="text-secondary">today</div>
                              </div>
                              <div class="col-auto align-self-center">
                                <div class="badge bg-primary"></div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/000f.jpg)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Emmy Levet</strong> created a new project <strong>Morning alarm clock</strong>.
                                </div>
                                <div class="text-secondary">4 days ago</div>
                              </div>
                              <div class="col-auto align-self-center">
                                <div class="badge bg-primary"></div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/001f.jpg)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Maryjo Lebarree</strong> liked your photo.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar">EP</span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Egan Poetz</strong> registered new client as <strong>Trilia</strong>.
                                </div>
                                <div class="text-secondary">yesterday</div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/002f.jpg)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Kellie Skingley</strong> closed a new deal on project <strong>Pen Pineapple Apple Pen</strong>.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/003f.jpg)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Christabel Charlwood</strong> created a new project for <strong>Wikibox</strong>.
                                </div>
                                <div class="text-secondary">4 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar">HS</span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Haskel Shelper</strong> change status of <strong>Tabler Icons</strong> from <strong>open</strong> to <strong>closed</strong>.
                                </div>
                                <div class="text-secondary">today</div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/006m.jpg)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Lorry Mion</strong> liked <strong>Tabler UI Kit</strong>.
                                </div>
                                <div class="text-secondary">yesterday</div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/004f.jpg)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Leesa Beaty</strong> posted new video.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/007m.jpg)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Perren Keemar</strong> and 3 others followed you.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar">SA</span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Sunny Airey</strong> upload 3 new photos to category <strong>Inspirations</strong>.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/009m.jpg)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Geoffry Flaunders</strong> made a <strong>$10</strong> donation.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/010m.jpg)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Thatcher Keel</strong> created a profile.
                                </div>
                                <div class="text-secondary">3 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/005f.jpg)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Dyann Escala</strong> hosted the event <strong>Tabler UI Birthday</strong>.
                                </div>
                                <div class="text-secondary">4 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/006f.jpg)"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Avivah Mugleston</strong> mentioned you on <strong>Best of 2020</strong>.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="row">
                              <div class="col-auto">
                                <span class="avatar">AA</span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>Arlie Armstead</strong> sent a Review Request to <strong>Amanda Blake</strong>.
                                </div>
                                <div class="text-secondary">2 days ago</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Social Media Traffic</h3>
                  </div>

                </div>
              </div>

              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <h3 class="card-title">Proyectos</h3>
                      <div class="ms-auto">
                        <div class="dropdown">
                          <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item active" href="#">Last 7 days</a>
                            <a class="dropdown-item" href="#">Last 30 days</a>
                            <a class="dropdown-item" href="#">Last 3 months</a>
                          </div>
                        </div>
                      </div>
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
                                    name: 'Startup',
                                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 60, 70, 50]
                                    }, {
                                    name: 'Empresarial',
                                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94, 100, 105, 90]
                                    }, {
                                    name: 'Corporativo',
                                    data: [66, 75, 90, 92, 78, 110, 96, 100, 90, 80, 95, 93]
                                    },{
                                    name: 'Escalable',
                                    data: [35, 41, 36, 26, 45, 48, 52, 53, 41, 30, 55, 60]
                                    }],
                                    chart: {
                                    type: 'bar',
                                    height: 350
                                    },
                                    plotOptions: {
                                    bar: {
                                        horizontal: false,
                                        columnWidth: '55%',
                                        endingShape: 'rounded'
                                    },
                                    },
                                    dataLabels: {
                                    enabled: false
                                    },
                                    stroke: {
                                    show: true,
                                    width: 2,
                                    colors: ['transparent']
                                    },
                                    xaxis: {
                                    categories: ['Ene','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agos', 'Set', 'Oct', 'Nov', 'Dic'],
                                    },
                                    yaxis: {
                                    title: {
                                        text: 'cantidad'
                                    }
                                    },
                                    fill: {
                                    opacity: 1
                                    },
                                    tooltip: {
                                    y: {
                                        formatter: function (val) {
                                        return val + " proyectos"
                                        }
                                    }
                                    }
                                    };

                                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                                    chart.render();
                            });
                          </script>

                      </div>
                      <div class="col-md-auto">
                        <div class="divide-y divide-y-fill">
                          <div class="px-3">
                            <div class="text-secondary">
                              <span class="status-dot bg-azure"></span> Startup
                            </div>
                            <div class="h2">11,425</div>
                          </div>
                          <div class="px-3">
                            <div class="text-secondary">
                              <span class="status-dot bg-success"></span> Empresarial
                            </div>
                            <div class="h2">6,458</div>
                          </div>
                          <div class="px-3">
                            <div class="text-secondary">
                              <span class="status-dot bg-yellow"></span> Corporativo
                            </div>
                            <div class="h2">3,985</div>
                          </div>
                          <div class="px-3">
                            <div class="text-secondary">
                              <span class="status-dot bg-red"></span> Escalable
                            </div>
                            <div class="h2">3,985</div>
                          </div>
                        </div>
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
                        document.addEventListener("DOMContentLoaded", function() {
                          window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
                            chart: {
                              type: "donut",
                              fontFamily: 'inherit',
                              height: 240,
                              sparkline: {
                                enabled: true
                              },
                              animations: {
                                enabled: true
                              },
                            },
                            fill: {
                              opacity: 1,
                            },
                            series: [44, 55, 12, 2],
                            labels: ["Direct", "Affilliate", "E-mail", "Other"],
                            tooltip: {
                              theme: 'dark'
                            },
                            grid: {
                              strokeDashArray: 4,
                            },
                            colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("primary", 0.6), tabler.getColor("gray-300")],
                            legend: {
                              show: true,
                              position: 'bottom',
                              offsetY: 12,
                              markers: {
                                width: 10,
                                height: 10,
                                radius: 100,
                              },
                              itemMargin: {
                                horizontal: 8,
                                vertical: 8
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
                            <div id="chart-demo-pie2" class="chart-lg"></div>
                        </div>

                      <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
                      <script>
                        document.addEventListener("DOMContentLoaded", function() {
                          window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie2'), {
                            chart: {
                              type: "donut",
                              fontFamily: 'inherit',
                              height: 240,
                              sparkline: {
                                enabled: true
                              },
                              animations: {
                                enabled: true
                              },
                            },
                            fill: {
                              opacity: 1,
                            },
                            series: [44, 55, 12, 2],
                            labels: ["Direct", "Affilliate", "E-mail", "Other"],
                            tooltip: {
                              theme: 'dark'
                            },
                            grid: {
                              strokeDashArray: 4,
                            },
                            colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("primary", 0.6), tabler.getColor("gray-300")],
                            legend: {
                              show: true,
                              position: 'bottom',
                              offsetY: 12,
                              markers: {
                                width: 10,
                                height: 10,
                                radius: 100,
                              },
                              itemMargin: {
                                horizontal: 8,
                                vertical: 8
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
                            <div id="chart-demo-pie3" class="chart-lg"></div>
                        </div>

                      <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
                      <script>
                        document.addEventListener("DOMContentLoaded", function() {
                          window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie3'), {
                            chart: {
                              type: "donut",
                              fontFamily: 'inherit',
                              height: 240,
                              sparkline: {
                                enabled: true
                              },
                              animations: {
                                enabled: true
                              },
                            },
                            fill: {
                              opacity: 1,
                            },
                            series: [44, 55, 12, 2],
                            labels: ["Direct", "Affilliate", "E-mail", "Other"],
                            tooltip: {
                              theme: 'dark'
                            },
                            grid: {
                              strokeDashArray: 4,
                            },
                            colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("primary", 0.6), tabler.getColor("gray-300")],
                            legend: {
                              show: true,
                              position: 'bottom',
                              offsetY: 12,
                              markers: {
                                width: 10,
                                height: 10,
                                radius: 100,
                              },
                              itemMargin: {
                                horizontal: 8,
                                vertical: 8
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
                            <div id="chart-demo-pie4" class="chart-lg"></div>
                        </div>

                      <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
                      <script>
                        document.addEventListener("DOMContentLoaded", function() {
                          window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie4'), {
                            chart: {
                              type: "donut",
                              fontFamily: 'inherit',
                              height: 240,
                              sparkline: {
                                enabled: true
                              },
                              animations: {
                                enabled: true
                              },
                            },
                            fill: {
                              opacity: 1,
                            },
                            series: [44, 55, 12, 2],
                            labels: ["Direct", "Affilliate", "E-mail", "Other"],
                            tooltip: {
                              theme: 'dark'
                            },
                            grid: {
                              strokeDashArray: 4,
                            },
                            colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("primary", 0.6), tabler.getColor("gray-300")],
                            legend: {
                              show: true,
                              position: 'bottom',
                              offsetY: 12,
                              markers: {
                                width: 10,
                                height: 10,
                                radius: 100,
                              },
                              itemMargin: {
                                horizontal: 8,
                                vertical: 8
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
