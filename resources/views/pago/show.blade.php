<div id="full-page-loader" class="full-page-loader">
    <!-- Puedes ajustar la clase según la implementación de spinners de Tabler.io -->
    <div class="spinner"></div>
</div>
<div id="content">
@extends('tablar::page')

@section('title', 'Ver Pago')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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
                        {{ __('Pago ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('pagos.index') }}" class="btn btn-vk d-none d-sm-inline-block texto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-pulse icon-tabler icon-tabler-caret-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 6l-6 6l6 6v-12" /></svg>
                            Retroceder
                        </a>
                        <a href="{{ route('pagos.index') }}" class="btn btn-vk d-sm-none btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-pulse icon-tabler icon-tabler-caret-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 6l-6 6l6 6v-12" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    @if(config('tablar','display_alert'))
                        @include('tablar::common.alert')
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detalle del Pago</h3>
                        </div>
                        <div class="card-body" style="font-size: 15px;">
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Fecha:</strong>
                            {{\Carbon\Carbon::parse($pago->fecha)->format('d-m-Y') }}
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Proyecto Id:</strong>
                            {{ $pago->proyecto->nombre }}
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Cliente:</strong>
                            {{ $pago->cliente }}
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Monto:</strong>
                            ${{ $pago->monto }} MXN
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Gastosingreso:</strong>
                            ${{ $pago->gastosingreso }} MXN
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Conceptogasto:</strong>
                            {{ $pago->conceptogasto }}
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Diezmo:</strong>
                            ${{ $pago->diezmo }} MXN
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Libre:</strong>
                            ${{ $pago->libre }} MXN
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Metodopago:</strong>
                            {{ $pago->metodopago }}
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                            <div class="form-group d-flex justify-content-between" style="margin-bottom: 5px;">
                                <strong>Adjunto:</strong>
                                <span class="col">{{ $pago->adjunto }}</span>
                                <div class="d-flex align-items-center">
                                    @if ($pago->adjunto)
                                    <div class="btn-list ml-2">
                                        <!-- Enlace para mostrar PDF en modal -->
                                        <a href="#" onclick="mostrarImagen('{{ asset('archivo/adjunto/' . $pago->adjunto) }}');" class="btn btn-flickr d-none d-sm-inline-block texto" data-bs-toggle="modal" data-bs-target="#imagenModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tada icon-tabler icon-tabler-photo-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M11.5 21h-5.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v5.5" /><path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M20.2 20.2l1.8 1.8" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l2 2" /></svg>
                                            Ver
                                        </a>
                                        <!-- Enlace para mostrar PDF en modal (versión para dispositivos pequeños) -->
                                        <a href="#" onclick="mostrarImagen('{{ asset('archivo/adjunto/' . $pago->adjunto) }}');" class="btn btn-flickr d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#imagenModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tada icon-tabler icon-tabler-photo-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M11.5 21h-5.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v5.5" /><path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M20.2 20.2l1.8 1.8" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l2 2" /></svg>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal para mostrar la imagen -->
    <div class="modal fade" id="imagenModal" tabindex="-1" role="dialog" aria-labelledby="imagenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagenModalLabel">{{ $pago->adjunto }}</h5>
                    <div class="d-flex align-items-center">
                        <!-- Ícono de descarga -->
                        @if ($pago->adjunto)
                        <a href="{{ asset('archivo/adjunto/' . $pago->adjunto) }}" download="{{ $pago->adjunto }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                        </a>
                        @endif

                        <!-- Botón de cierre -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                    <div class="modal-body">
                        <img id="imagenAdjunta" alt="Imagen Adjunta">
                    </div>

            </div>
        </div>
    </div>
    <style>
        #imagenModal .modal-body {
            max-width: 100%;
            overflow-x: auto;
            background-color: rgba(36, 36, 36, 0.151);
        }

        #imagenModal .modal-body img {
            max-width: 100%;
            height: auto;
        }
    </style>
    <script>
        function mostrarImagen(imagenUrl) {
            // Establecer la fuente de la imagen en el modal
            $("#imagenAdjunta").attr("src", imagenUrl);

            // Abrir el modal
            $("#imagenModal").modal("show");
        }
    </script>
@endsection
</div>
<style>
    *{
        font-family: 'Poppins', sans-serif;
    }
    .texto{
        font-family: 'Poppins', sans-serif;
    }
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
