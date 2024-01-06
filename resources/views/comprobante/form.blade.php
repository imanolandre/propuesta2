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
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('cotizacion_id', 'Cotización') }}</label>
            <div>
                {{ Form::select('cotizacion_id', $cotizaciones, $comprobante->cotizacion_id, ['class' => 'texto tom-select form-control form-select select2' . ($errors->has('cotizacion_id') ? ' is-invalid' : ''),'placeholder' => 'Seleccione Cotización'])}}
                {!! $errors->first('cotizacion_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('Nombre Cliente') }}</label>
            <div>
                {{ Form::text('documento', $comprobante->documento, ['class' => 'form-control texto', 'readonly' => 'readonly', 'placeholder' => 'Cliente']) }}
                {!! $errors->first('documento', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('servicio') }}</label>
            <div>
                {{ Form::text('servicio', $comprobante->servicio, ['class' => 'form-control texto', 'readonly' => 'readonly', 'placeholder' => 'Servicio']) }}
                {!! $errors->first('servicio', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('Importe total') }}</label>
            <div>
                {{ Form::text('total', $comprobante->total, ['class' => 'form-control texto', 'readonly' => 'readonly', 'placeholder' => 'Total']) }}
                {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('total anticipo') }}</label>
            <div>
                {{ Form::text('anticipo', $comprobante->anticipo, ['class' => 'form-control texto','placeholder' => 'Anticipo']) }}
                {!! $errors->first('anticipo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('descripción') }}</label>
            <div>
                {{ Form::textarea('descripcion', $comprobante->descripcion, ['class' => 'form-control texto', 'readonly' => 'readonly', 'placeholder' => 'Descripcion']) }}
                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('cuenta origen') }}</label>
            <div>
                {{ Form::text('cuentaorigen', $comprobante->cuentaorigen, ['class' => 'form-control texto' .
                ($errors->has('cuentaorigen') ? ' is-invalid' : ''), 'placeholder' => 'Cuentaorigen']) }}
                {!! $errors->first('cuentaorigen', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('concepto de pago') }}</label>
            <div>
                {{ Form::text('conceptopago', $comprobante->conceptopago, ['class' => 'form-control texto' .
                ($errors->has('conceptopago') ? ' is-invalid' : ''), 'placeholder' => 'Conceptopago']) }}
                {!! $errors->first('conceptopago', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('metodo de pago') }}</label>
            <div>
                {{ Form::text('metodopago', $comprobante->metodopago, ['class' => 'form-control texto' .
                ($errors->has('metodopago') ? ' is-invalid' : ''), 'placeholder' => 'Metodopago']) }}
                {!! $errors->first('metodopago', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('folio de operación') }}</label>
            <div>
                {{ Form::text('foliooperacion', $comprobante->foliooperacion, ['class' => 'form-control texto' .
                ($errors->has('foliooperacion') ? ' is-invalid' : ''), 'placeholder' => 'Foliooperacion']) }}
                {!! $errors->first('foliooperacion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('fecha de operación') }}</label>
            <div>
                {{ Form::datetimeLocal('fechaoperacion', $comprobante->fechaoperacion, ['class' => 'form-control texto' .
                ($errors->has('fechaoperacion') ? ' is-invalid' : ''), 'placeholder' => 'Fechaoperacion']) }}
                {!! $errors->first('fechaoperacion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('fecha de aplicación') }}</label>
            <div>
                {{ Form::datetimeLocal('fechaaplicacion', $comprobante->fechaaplicacion, ['class' => 'form-control texto' .
                ($errors->has('fechaaplicacion') ? ' is-invalid' : ''), 'placeholder' => 'fechaaplicacion']) }}
                {!! $errors->first('fechaaplicacion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
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
<script>
    $(document).ready(function () {
        $('select[name="cotizacion_id"]').change(function () {
            var cotizacionId = $(this).val();

            // Realizar la solicitud AJAX
            $.ajax({
                url: '/obtener-datos-cotizacion/' + cotizacionId,
                type: 'GET',
                success: function (data) {
                    // Imprimir datos en la consola para verificar
                    console.log('Datos de Cotización:', data);

                    // Rellenar los campos del formulario con los datos obtenidos
                    $('input[name="documento"]').val(data.nombreCliente);
                    $('input[name="servicio"]').val(data.nombreServicio);
                    $('input[name="total"]').val(data.nombreTotal);
                    $('input[name="anticipo"]').val(data.nombreAnticipo);
                    $('textarea[name="descripcion"]').val(data.nombreDescripcion);
                },
                error: function (xhr, status, error) {
                    // Imprimir error en la consola
                    console.error('Error en la solicitud AJAX:', error);
                }
            });
        });
    });
</script>
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
