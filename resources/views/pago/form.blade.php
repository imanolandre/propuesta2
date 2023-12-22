<div id="page-loader" class="page-loader" style="display: none;">
    <div class="spinner"></div>
    <div id="loading-text" class="loading-text">Guardando</div>
</div>
<div id="content">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<div class="row">
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="form-label required">{{ Form::label('fecha', 'Fecha de Pago') }}</label>
            <div>
                {{ Form::date('fecha', $pago->fecha, ['class' => 'form-control texto' .
                ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Pago']) }}
                {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="form-label required">   {{ Form::label('monto $ MXN') }}</label>
            <div>
                {{ Form::text('monto', $pago->monto, ['class' => 'form-control texto' .
                ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
                {!! $errors->first('monto', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="form-label required">   {{ Form::label('gastos $ MXN') }}</label>
            <div>
                {{ Form::text('gastosingreso', $pago->gastosingreso, ['class' => 'form-control texto' .
                ($errors->has('gastosingreso') ? ' is-invalid' : ''), 'placeholder' => 'Gastosingreso']) }}
                {!! $errors->first('gastosingreso', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label required">   {{ Form::label('concepto del gasto') }}</label>
            <div>
                {{ Form::text('conceptogasto', $pago->conceptogasto, ['class' => 'form-control texto' .
                ($errors->has('conceptogasto') ? ' is-invalid' : ''), 'placeholder' => 'Conceptogasto']) }}
                {!! $errors->first('conceptogasto', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label required">   {{ Form::label('metodo de pago') }}</label>
            <div>
                {{ Form::select('metodopago', [
                    'Transferencia Bancaria' => 'Transferencia Bancaria',
                    'Efectivo' => 'Efectivo',
                    'PayPal' => 'PayPal',
                    'Depósito en sucursal' => 'Depósito en sucursal',
                    ], $pago->metodopago, ['class' => 'form-control form-select texto' . ($errors->has('metodopago') ? ' is-invalid' : ''),'placeholder' => 'Seleccione metodo de pago']) }}
                {!! $errors->first('metodopago', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label required">   {{ Form::label('proyecto_id', 'Nombre del proyecto') }}</label>
            <div>
                {{ Form::select('proyecto_id', $proyectos, $pago->proyecto_id, ['class' => 'texto tom-select form-control form-select select2' . ($errors->has('proyecto_id') ? ' is-invalid' : ''),'placeholder' => 'Selecciona un proyecto'])}}
                {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('cliente', 'Nombre del Cliente') }}</label>
            <div>
                {{ Form::text('cliente', $nombreCliente, ['class' => 'form-control texto', 'readonly' => 'readonly']) }}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label required">{{ Form::label('imagen Adjunto') }}</label>
            <div>
                {{ Form::file('adjunto', ['class' =>'form-control form-label texto' . ($errors->has('adjunto') ? ' is-invalid' : '')]) }}
                {!! $errors->first('adjunto', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            @if($pago->adjunto)
            <div class="form-label">Archivo actual: {{ $pago->adjunto }}</div>
            @endif
        </div>
    </div>
    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <button type="reset" href="#" class="btn btn-secondary texto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-rotate-clockwise-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 4.55a8 8 0 0 1 6 14.9m0 -4.45v5h5" /><path d="M5.63 7.16l0 .01" /><path d="M4.06 11l0 .01" /><path d="M4.63 15.1l0 .01" /><path d="M7.16 18.37l0 .01" /><path d="M11 19.94l0 .01" /></svg>
                    Limpiar
                </button>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit texto" onclick="submitForm()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tada icon-tabler icon-tabler-pencil-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /><path d="M15 19l2 2l4 -4" /></svg>
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('select[name="proyecto_id"]').change(function () {
            var proyectoId = $(this).val();

            // Realizar la solicitud AJAX
            $.ajax({
                url: '/obtener-nombre-cliente/' + proyectoId,
                type: 'GET',
                success: function (data) {
                    $('input[name="cliente"]').val(data.nombreCliente);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inicializar Tom Select en el campo de selección del cliente
        var select = new TomSelect('.select2', {
            // Opciones de configuración de Tom Select
        });

        // Resto de tu script...
        document.getElementById('submit-button').addEventListener('click', function () {
            // ... Tu lógica actual ...
        });
    });
</script>
</div>
<style>
    *{
        font-family: 'Poppins', sans-serif;
    }
    .texto{
        font-family: 'Poppins', sans-serif;
    }
    .tom-select{
        background-color: #ffffff;
        color: #000000;
    }
    /* Estilos del Contenedor del Spinner */
    #page-loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.808);
        display: flex;
        flex-direction: column;
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

    /* Estilos del Texto "Guardando" */
    .loading-text {
        margin-top: 10px;
    }
</style>
<script>
    function submitForm() {
        // Mostrar el Spinner y el texto "Guardando"
        showSpinner();
        // Aquí puedes agregar lógica adicional si es necesario
        // Enviar el formulario (este código puede variar según tu implementación)
        document.getElementById('your-form-id').submit();
    }

    // Mostrar el Spinner y el texto "Guardando"
    function showSpinner() {
        document.getElementById('page-loader').style.display = 'flex';
        document.getElementById('loading-text').innerText = 'Guardando';
    }

    // Ocultar el Spinner y el texto "Guardando"
    function hideSpinner() {
        document.getElementById('page-loader').style.display = 'none';
        document.getElementById('loading-text').innerText = '';
    }
</script>
