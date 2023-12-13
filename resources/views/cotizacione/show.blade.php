@extends('tablar::page')

@section('title', 'View Cotizacione')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Vista
                    </div>
                    <h2 class="page-title">
                        {{ __('Cotizacione ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('cotizaciones.index') }}" class="btn btn-vk d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-pulse icon-tabler icon-tabler-caret-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 6l-6 6l6 6v-12" /></svg>
                            Retroceder
                        </a>
                        <a href="{{ route('cotizaciones.index') }}" class="btn btn-vk d-sm-none btn-icon">
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
                            <h3 class="card-title">Detalle de Cotización</h3>
                        </div>
                        <div class="card-body" style="font-size: 15px;">
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Cliente:</strong>
                            {{ $cotizacione->cliente }}
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Servicio:</strong>
                            {{ $cotizacione->servicio }}
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Planes:</strong>
                            {{ $cotizacione->planes }}
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Importe:</strong>
                            {{ $cotizacione->importe }}
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                            <strong>Descuento:</strong>
                            {{ $cotizacione->descuento }}
                            </div>
                            @if(!empty($cotizacione->servicioadicional) && !empty($cotizacione->importeadicional))
                                <div class="form-group" style="margin-bottom: 5px;">
                                    <strong>Servicioadicional:</strong>
                                    {{ $cotizacione->servicioadicional }}
                                </div>
                                <div class="form-group" style="margin-bottom: 5px;">
                                    <strong>Importeadicional:</strong>
                                    {{ $cotizacione->importeadicional }}
                                </div>
                            @endif
                            <div class="form-group" style="margin-bottom: 5px;">
                                <strong>Total:</strong>
                                {{ $cotizacione->total }}
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                                <strong>Anticipo:</strong>
                                {{ $cotizacione->anticipo }}
                            </div>
                            <div class="form-group d-flex justify-content-between" style="margin-bottom: 5px;">
                                <strong>Documento:</strong>
                                <span class="col">{{ pathinfo($cotizacione->documento)['filename'] }}</span>
                                <div class="d-flex align-items-center">
                                    @if ($cotizacione->documento)
                                    <div class="btn-list ml-2">
                                        <!-- Enlace para mostrar PDF en modal -->
                                        <a href="#" onclick="mostrarPDF('{{ asset($cotizacione->documento) }}', '{{ pathinfo($cotizacione->documento)['filename'] }}');" class="btn btn-youtube d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#pdfModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tada icon-tabler icon-tabler-file-type-pdf ml-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                                            Ver
                                        </a>
                                        <!-- Enlace para mostrar PDF en modal (versión para dispositivos pequeños) -->
                                        <a href="#" onclick="mostrarPDF('{{ asset($cotizacione->documento) }}', '{{ pathinfo($cotizacione->documento)['filename'] }}');" class="btn btn-youtube d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#pdfModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tada icon-tabler icon-tabler-file-type-pdf ml-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $cotizacione->descripcion }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">{{ pathinfo($cotizacione->documento)['filename'] }}</h5>
                    <div class="d-flex align-items-center">
                        <!-- Ícono de descarga -->
                        @if ($cotizacione->documento)
                        <a href="{{ asset($cotizacione->documento) }}" download="{{ pathinfo($cotizacione->documento)['filename'] }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                        </a>
                        @endif
                        <!-- Botón de cierre -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body">
                    <!-- Contenido del PDF se cargará aquí -->
                </div>
            </div>
        </div>
    </div>
    <style>
        #pdfModal .modal-body {
            max-width: 100%;
            overflow-x: auto;
            background-color: rgba(36, 36, 36, 0.151);
        }
        #pdfModal .modal-body canvas {
            max-width: 100%;
            height: auto;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script>
        function mostrarPDF(pdfURL, pdfFileName) {
            console.log('Mostrando PDF:', pdfFileName);
            const modal = $('#pdfModal');
            modal.find('.modal-title').text(pdfFileName);
            cargarPDF(pdfURL, modal.find('.modal-body'));
            modal.modal('show');
        }

        function cargarPDF(pdfURL, container) {
            console.log('Cargando PDF desde:', pdfURL);
            pdfjsLib.getDocument(pdfURL).promise.then(pdf => {
                for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                    pdf.getPage(pageNum).then(page => {
                        const canvas = document.createElement('canvas');
                        container.append(canvas);

                        const viewport = page.getViewport({ scale: 1 });
                        canvas.width = viewport.width;
                        canvas.height = viewport.height;

                        page.render({ canvasContext: canvas.getContext('2d'), viewport: viewport });
                    });
                }
            }).catch(error => {
                console.error('Error al cargar el PDF:', error);
                // Manejar el error, por ejemplo, mostrar un mensaje al usuario.
            });
        }
    </script>
@endsection


