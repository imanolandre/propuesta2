<div id="full-page-loader" class="full-page-loader">
    <!-- Puedes ajustar la clase según la implementación de spinners de Tabler.io -->
    <div class="spinner"></div>
</div>
<div id="content">
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-icon icon-tabler icon-tabler-report-money" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M12 17v1m0 -8v1" /></svg>
                            Registrar Corte
                        </a>
                        <a href="{{ route('pago.filtrar-fechas') }}" class="btn btn-cyan d-sm-none btn-icon">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-icon icon-tabler icon-tabler-report-money" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M12 17v1m0 -8v1" /></svg>
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
                        <div class="card-body border-bottom py-3 table-responsive">
                            <table style="margin-top: 55px; font-size:13px;" id="search-pagos" class="table table-vcenter datatable">
                                <thead>
                                <tr>
                                        <th class="w-1"><a class="table-header">No.</a></th>
										<th><a class="table-header">Fecha</a></th>
										<th><a class="table-header">Nombre del Proyecto</a></th>
										<th><a class="table-header">Nombre del Cliente</a></th>
										<th><a class="table-header">Monto $</a></th>
										<th><a class="table-header">Gastos $</a></th>
										<th><a class="table-header">Diezmo $</a></th>
										<th><a class="table-header">Libre $</a></th>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
 <script>
    $(document).ready(function () {
        new DataTable('#search-pagos', {
            responsive: true,
            autoWidth: false,
            language: {
                searchPlaceholder: "Buscar..."
            }
        });
    });
 </script>
 @endsection
 </div>
 <style>
     .table-header {
         color: #1b4faf; /* Color azul que mencionaste */
         font-weight: bold;
         cursor: pointer;
         font-size: 11px;
     }
     /* Estilo para Show entries */
 div.dataTables_length label {
     display: none;
     visibility: hidden;
 }
 /* Estilo para Search */
 div.dataTables_filter label {
     position: absolute;
     left: 20;
     color: #ffffff00; /* Color azul que mencionaste */
     width: 67%;
     margin-top: -20px;
 }
 .dataTables_filter input {
         width: 100%;
         height: 39px;
         font-size: 14px;
         background: #ffffff;
         border-radius: 4px;
         text-indent: 10px;
 }
 div.dataTables_paginate {
     margin-top: 20px; /* Ajusta este valor según sea necesario */
 }
 div.dataTables_info {
     display: none;
 }
 </style>
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
