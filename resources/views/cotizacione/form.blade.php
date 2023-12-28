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
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label required">   {{ Form::label('cliente') }}</label>
            <div>
                {{ Form::text('cliente', $cotizacione->cliente, ['class' => 'form-control texto' .
                ($errors->has('cliente') ? ' is-invalid' : ''), 'placeholder' => 'Cliente']) }}
                {!! $errors->first('cliente', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label required">   {{ Form::label('Seleccione tipo de servicio') }}</label>
            <div>
                {{ Form::select('servicio', [
                    'Desarrollo de Páginas web' => 'Desarrollo de Páginas web',
                    'E-commerce' => 'E-commerce',
                    ], $cotizacione->servicio, ['class' => 'form-control form-select texto' . ($errors->has('servicio') ? ' is-invalid' : ''),'placeholder' => 'Seleccione servicio']) }}
                {!! $errors->first('servicio', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label required">   {{ Form::label('planes') }}</label>
            <div>
                {{ Form::select('planes', [
                    'Básico' => 'Básico',
                    'Prémium' => 'Prémium',
                    'Empresarial' => 'Empresarial',
                    ], $cotizacione->planes, ['class' => 'form-control form-select texto' . ($errors->has('planes') ? ' is-invalid' : ''),'placeholder' => 'Seleccione plan']) }}
                {!! $errors->first('planes', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label required">   {{ Form::label('importe') }}</label>
            <div>
                {{ Form::text('importe', $cotizacione->importe, ['class' => 'form-control texto' .
                ($errors->has('importe') ? ' is-invalid' : ''), 'placeholder' => 'Importe']) }}
                {!! $errors->first('importe', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('descuento') }}</label>
            <div>
                {{ Form::text('descuento', $cotizacione->descuento, ['class' => 'form-control texto' .
                ($errors->has('descuento') ? ' is-invalid' : ''), 'placeholder' => 'Descuento']) }}
                {!! $errors->first('descuento', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group mb-3">
            <div class="form-check">
                {{ Form::checkbox('aplicar_descuento_adicional', 1, false, ['class' => 'form-check-input texto', 'id' => 'aplicar_descuento_adicional']) }}
                <label class="form-check-label" for="aplicar_descuento_adicional">{{ Form::label('aplicar_descuento_adicional', 'Aplicar Servicio Adicional') }}</label>
            </div>
        </div>
    </div>
    <!-- Campos de servicio adicional e importe adicional -->
    <div class="col-md-6" id="campos_servicio_adicional_1" style="display: none;">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('servicio adicional 1') }}</label>
            <div>
                {{ Form::text('servicioadicional1', $cotizacione->servicioadicional1, ['class' => 'form-control texto' .
                ($errors->has('servicioadicional1') ? ' is-invalid' : ''), 'placeholder' => 'Servicio adicional']) }}
            </div>
        </div>
    </div>
    <div class="col-md-3" id="campos_importe_adicional_1" style="display: none;">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('importe adicional 1') }}</label>
            <div>
                {{ Form::text('importeadicional1', $cotizacione->importeadicional1, ['class' => 'form-control texto' .
                ($errors->has('importeadicional1') ? ' is-invalid' : ''), 'placeholder' => 'Importe adicional']) }}
            </div>
        </div>
    </div>
    <div class="col-md-1 py-5" id="agregar_campos_btn" style="display: none;">
        <div class="form-group">
            <button type="button" class="btn btn-primary btn-sm ms-2" style="border-radius: 5px;" onclick="agregarCampos()">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            </button>
        </div>
    </div>
    <div class="col-md-6" id="campos_servicio_adicional_2" style="display: none;">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('servicio adicional 2') }}</label>
            <div>
                {{ Form::text('servicioadicional2', $cotizacione->servicioadicional2, ['class' => 'form-control texto' .
                ($errors->has('servicioadicional2') ? ' is-invalid' : ''), 'placeholder' => 'Servicio adicional']) }}
            </div>
        </div>
    </div>
    <div class="col-md-3" id="campos_importe_adicional_2" style="display: none;">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('importe adicional 2') }}</label>
            <div>
                {{ Form::text('importeadicional2', $cotizacione->importeadicional2, ['class' => 'form-control texto' .
                ($errors->has('importeadicional2') ? ' is-invalid' : ''), 'placeholder' => 'Importe adicional']) }}
            </div>
        </div>
    </div>
    <div class="col-md-6" id="campos_servicio_adicional_3" style="display: none;">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('servicio adicional 3') }}</label>
            <div>
                {{ Form::text('servicioadicional3', $cotizacione->servicioadicional3, ['class' => 'form-control texto' .
                ($errors->has('servicioadicional3') ? ' is-invalid' : ''), 'placeholder' => 'Servicio adicional']) }}
            </div>
        </div>
    </div>
    <div class="col-md-3" id="campos_importe_adicional_3" style="display: none;">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('importe adicional 3') }}</label>
            <div>
                {{ Form::text('importeadicional3', $cotizacione->importeadicional3, ['class' => 'form-control texto' .
                ($errors->has('importeadicional3') ? ' is-invalid' : ''), 'placeholder' => 'Importe adicional']) }}
            </div>
        </div>
    </div>
    <div class="col-md-6" id="campos_servicio_adicional_4" style="display: none;">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('servicio adicional 4') }}</label>
            <div>
                {{ Form::text('servicioadicional4', $cotizacione->servicioadicional4, ['class' => 'form-control texto' .
                ($errors->has('servicioadicional4') ? ' is-invalid' : ''), 'placeholder' => 'Servicio adicional']) }}
            </div>
        </div>
    </div>
    <div class="col-md-3" id="campos_importe_adicional_4" style="display: none;">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('importe adicional 4') }}</label>
            <div>
                {{ Form::text('importeadicional4', $cotizacione->importeadicional4, ['class' => 'form-control texto' .
                ($errors->has('importeadicional4') ? ' is-invalid' : ''), 'placeholder' => 'Importe adicional']) }}
            </div>
        </div>
    </div>
    <div class="col-md-6" id="campos_servicio_adicional_5" style="display: none;">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('servicio adicional 5') }}</label>
            <div>
                {{ Form::text('servicioadicional5', $cotizacione->servicioadicional5, ['class' => 'form-control texto' .
                ($errors->has('servicioadicional5') ? ' is-invalid' : ''), 'placeholder' => 'Servicio adicional']) }}
            </div>
        </div>
    </div>
    <div class="col-md-3" id="campos_importe_adicional_5" style="display: none;">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('importe adicional 5') }}</label>
            <div>
                {{ Form::text('importeadicional5', $cotizacione->importeadicional5, ['class' => 'form-control texto' .
                ($errors->has('importeadicional5') ? ' is-invalid' : ''), 'placeholder' => 'Importe adicional']) }}
            </div>
        </div>
    </div>
    <div class="col-md-1 py-5" id="quitar_campos_btn" style="display: none;">
        <div class="form-group">
            <button type="button" class="btn btn-secondary btn-sm ms-2" style="border-radius: 5px;" onclick="quitarCampos()">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-icon icon-tabler icon-tabler-minus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /></svg>
            </button>
        </div>
    </div>
        <div class="form-group mb-3">
            <label class="form-label required">   {{ Form::label('descripcion') }}</label>
            <div>
                {{ Form::textarea('descripcion', $cotizacione->descripcion, ['class' => 'form-control texto' .
                ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Agregar descripcion ...']) }}
                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
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
        // Manejar el cambio del estado del checkbox
        $('input[name="aplicar_descuento_adicional"]').change(function () {
            if ($(this).is(':checked')) {
                // Mostrar campos de servicio adicional e importe adicional
                $('#campos_servicio_adicional, #campos_importe_adicional, #agregar_campos_btn').show();
            } else {
                // Ocultar campos de servicio adicional e importe adicional
                $('#campos_servicio_adicional, #campos_importe_adicional, #agregar_campos_btn, #quitar_campos_btn').hide();
                contadorCampos=1;
            }
        });

    });

    let contadorCampos = 1; // Contador para seguir la cantidad de conjuntos de campos adicionales

    function agregarCampos() {
        contadorCampos++; // Incrementar el contador para mostrar el siguiente conjunto de campos

        // Mostrar los siguientes campos adicionales
        $(`#campos_servicio_adicional_${contadorCampos}`).show();
        $(`#campos_importe_adicional_${contadorCampos}`).show();
        $(`#quitar_campos_btn`).show();
    }

    function quitarCampos() {
        // Ocultar los dos últimos conjuntos de campos adicionales
        $(`#campos_servicio_adicional_${contadorCampos}`).hide();
        $(`#campos_importe_adicional_${contadorCampos}`).hide();

        // Disminuir el contador para que apunte al último conjunto visible
        contadorCampos--;

        // Si el contador es 1, oculta el botón de quitar campos
        if (contadorCampos === 1) {
            $('#quitar_campos_btn').hide();
        }
    }

    $(document).ready(function () {
        $('input[name="aplicar_descuento_adicional"]').change(function () {
            if ($(this).is(':checked')) {
                // Mostrar el primer conjunto de campos adicionales y el botón de más
                $('#campos_servicio_adicional_1, #campos_importe_adicional_1, #agregar_campos_btn').show();
            } else {
                // Ocultar todos los campos adicionales y el botón de más
                $('[id^="campos_servicio_adicional_"], [id^="campos_importe_adicional_"]').hide();
                $('#agregar_campos_btn').hide();
            }
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
