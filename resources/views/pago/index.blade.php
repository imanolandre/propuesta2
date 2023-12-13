@extends('tablar::page')

@section('title')
    Pagos
@endsection

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Módulo
                    </div>
                    <h2 class="page-title" style="font-size: 30px;">
                        {{ __('Pagos ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <!-- Botón de exportar a Excel -->
                        <a href="{{ route('pago.filtrar-fechas') }}" class="btn btn-cyan d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/download -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tada icon-tabler icon-tabler-report-money" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M12 17v1m0 -8v1" /></svg>
                            Registrar Corte
                        </a>
                        <a href="{{ route('pago.filtrar-fechas') }}" class="btn btn-cyan d-sm-none btn-icon">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tada icon-tabler icon-tabler-report-money" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M12 17v1m0 -8v1" /></svg>
                        </a>
                        <a href="{{ route('pagos.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-pulse" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Agregar Pago
                        </a>
                        <a href="{{ route('pagos.create') }}" class="btn btn-primary d-sm-none btn-icon">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-pulse" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if(config('tablar','display_alert'))
                @include('sweetalert::alert')
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <form style="width: 70%;" method="GET" action="{{ route('pagos.index') }}" class="ml-auto text-muted input-icon">
                                    <input name="buscarpor" type="text" class="form-control" placeholder="Buscar…" value="{{ $buscarpor }}"/>
                                    <span class="input-icon-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="10" cy="10" r="7" />
                                                <line x1="21" y1="21" x2="15" y2="15" />
                                            </svg>
                                    </span>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter datatable">
                                <thead>
                                <tr>
                                        <th class="w-1">No.</th>
										<th><a href="{{ route('pagos.index', ['orden' => 'fecha', 'direccion' => $direccionFecha]) }}">Fecha</a></th>
										<th><a href="{{ route('pagos.index', ['orden' => 'proyecto.nombre', 'direccion' => $direccionNombreProyecto]) }}">Nombre del Proyecto</a></th>
										<th><a href="{{ route('pagos.index', ['orden' => 'cliente', 'direccion' => $direccionCliente]) }}">Nombre del Cliente</a></th>
										<th><a href="{{ route('pagos.index', ['orden' => 'monto', 'direccion' => $direccionMonto]) }}">Monto $</a></th>
										<th><a href="{{ route('pagos.index', ['orden' => 'gastosingreso', 'direccion' => $direccionGastosIngreso]) }}">Gastos $</a></th>
										<th><a href="{{ route('pagos.index', ['orden' => 'diezmo', 'direccion' => $direccionDiezmo]) }}">Diezmo $</a></th>
										<th><a href="{{ route('pagos.index', ['orden' => 'libre', 'direccion' => $direccionLibre]) }}">Libre $</a></th>
                                    <th class="w-1"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse ($pagos as $pago)
                                    <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{\Carbon\Carbon::parse($pago->fecha)->format('d-m-Y') }}</td>
											<td>{{ $pago->proyecto->nombre }}</td>
											<td>{{ $pago->cliente }}</td>
											<td>${{ $pago->monto }} MXN</td>
											<td>${{ $pago->gastosingreso }} MXN</td>
											<td>${{ $pago->diezmo }} MXN</td>
											<td>${{ $pago->libre }} MXN</td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown">
                                                        Acciones
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item"
                                                           href="{{ route('pagos.show',$pago->id) }}">
                                                            Ver
                                                        </a>
                                                        <a class="dropdown-item"
                                                           href="{{ route('pagos.edit',$pago->id) }}">
                                                            Editar
                                                        </a>
                                                        <form id="delete-form-{{ $pago->id }}"
                                                            action="{{ route('pagos.destroy',$pago->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    onclick="confirmDelete({{ $pago->id }}); return false;"
                                                                    class="dropdown-item text-red"><i
                                                                    class="fa fa-fw fa-trash"></i>
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td>No Data Found</td>
                                @endforelse
                                </tbody>

                            </table>
                        </div>
                       <div class="card-footer d-flex align-items-center">
                            {!! $pagos->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(pagoId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrá recuperar este registro!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Obtén el formulario de eliminación específico utilizando el ID del formulario
                    const deleteForm = document.getElementById(`delete-form-${pagoId}`);
                    if (deleteForm) {
                        deleteForm.submit();
                    }
                }
            });
        }
    </script>
@endsection
