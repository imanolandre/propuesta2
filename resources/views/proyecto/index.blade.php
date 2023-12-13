@extends('tablar::page')

@section('title')
    Proyectos
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
                        {{ __('Proyectos ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <!-- Botón de exportar a Excel -->
                        <a href="{{ route('export.proyectos') }}" class="btn btn-teal d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/download -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tada" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M12 17v-6" /><path d="M9.5 14.5l2.5 2.5l2.5 -2.5" /></svg>
                            Exportar Excel
                        </a>
                        <a href="{{ route('export.clientes') }}" class="btn btn-teal d-sm-none btn-icon">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tada" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M12 17v-6" /><path d="M9.5 14.5l2.5 2.5l2.5 -2.5" /></svg>
                        </a>
                        <a href="{{ route('proyectos.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-pulse" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Agregar Proyecto
                        </a>
                        <a href="{{ route('proyectos.create') }}" class="btn btn-primary d-sm-none btn-icon">
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
                                <form style="width: 70%;" method="GET" action="{{ route('proyectos.index') }}" class="ml-auto text-muted input-icon">
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
                                        <th><a href="{{ route('proyectos.index', ['orden' => 'nombre', 'direccion' => $direccionNombre]) }}">Nombre del proyecto</a></th>
                                        <th><a href="{{ route('proyectos.index', ['orden' => 'cliente->nombrecliente', 'direccion' => $direccionCliente]) }}">Nombre del Cliente</a></th>
                                        <th><a href="{{ route('proyectos.index', ['orden' => 'tipo', 'direccion' => $direccionTipo]) }}">Tipo</a></th>
                                        <th><a href="{{ route('proyectos.index', ['orden' => 'cotización', 'direccion' => $direccionCotizacion]) }}">Servicio</a></th>
                                        <th><a href="{{ route('proyectos.index', ['orden' => 'fechainicio', 'direccion' => $direccionFechaInicio]) }}">Fecha inicio</a></th>
                                        <th><a href="{{ route('proyectos.index', ['orden' => 'fechafin', 'direccion' => $direccionFechaFin]) }}">Fecha fin</a></th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                @forelse ($proyectos as $proyecto)
                                    <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $proyecto->nombre }}</td>
                                            <td>{{ $proyecto->cliente->nombrecliente }}</td>
											<td>{{ $proyecto->tipo }}</td>
											<td>{{ $proyecto->cotización }}</td>
											<td>{{ \Carbon\Carbon::parse($proyecto->fechainicio)->format('d-m-Y') }}</td>
											<td>{{ \Carbon\Carbon::parse($proyecto->fechafin)->format('d-m-Y') }}</td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown">
                                                        Acciones
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item"
                                                           href="{{ route('proyectos.show',$proyecto->id) }}">
                                                            Ver
                                                        </a>
                                                        <a class="dropdown-item"
                                                           href="{{ route('proyectos.edit',$proyecto->id) }}">
                                                            Editar
                                                        </a>
                                                        <form id="delete-form-{{ $proyecto->id }}"
                                                            action="{{ route('proyectos.destroy',$proyecto->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    onclick="confirmDelete({{ $proyecto->id }}); return false;"
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
                            {!! $proyectos->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(proyectoId) {
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
                    const deleteForm = document.getElementById(`delete-form-${proyectoId}`);
                    if (deleteForm) {
                        deleteForm.submit();
                    }
                }
            });
        }
    </script>
@endsection
