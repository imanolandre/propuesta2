@extends('tablar::page')

@section('title', 'View Comprobante')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        View
                    </div>
                    <h2 class="page-title">
                        {{ __('Comprobante ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('comprobante.index') }}" class="btn btn-vk d-none d-sm-inline-block texto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-pulse icon-tabler icon-tabler-caret-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 6l-6 6l6 6v-12" /></svg>
                            Retroceder
                        </a>
                        <a href="{{ route('comprobante.index') }}" class="btn btn-vk d-sm-none btn-icon">
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
                            <h3 class="card-title">Comprobante Details</h3>
                        </div>
                        <div class="card-body">

<div class="form-group">
<strong>Cotizacion Id:</strong>
{{ pathinfo($comprobante->cotizacione->documento)['filename']}}
</div>
<div class="form-group">
<strong>Documento:</strong>
{{ $comprobante->documento }}
</div>
<div class="form-group">
<strong>Servicio:</strong>
{{ $comprobante->servicio }}
</div>
<div class="form-group">
<strong>Total:</strong>
{{ $comprobante->total }}
</div>
<div class="form-group">
<strong>Anticipo:</strong>
{{ $comprobante->anticipo }}
</div>
<div class="form-group">
<strong>Descripcion:</strong>
{{ $comprobante->descripcion }}
</div>
<div class="form-group">
<strong>Cuentaorigen:</strong>
{{ $comprobante->cuentaorigen }}
</div>
<div class="form-group">
<strong>Conceptopago:</strong>
{{ $comprobante->conceptopago }}
</div>
<div class="form-group">
<strong>Metodopago:</strong>
{{ $comprobante->metodopago }}
</div>
<div class="form-group">
<strong>Foliooperacion:</strong>
{{ $comprobante->foliooperacion }}
</div>
<div class="form-group">
<strong>Fechaoperacion:</strong>
{{ $comprobante->fechaoperacion }}
</div>
<div class="form-group">
<strong>Adjunto:</strong>
{{ $comprobante->adjunto }}
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


