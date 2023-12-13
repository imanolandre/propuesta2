<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('cliente') }}</label>
            <div>
                {{ Form::text('cliente', $cotizacione->cliente, ['class' => 'form-control' .
                ($errors->has('cliente') ? ' is-invalid' : ''), 'placeholder' => 'Cliente']) }}
                {!! $errors->first('cliente', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('Seleccione tipo de servicio') }}</label>
            <div>
                {{ Form::select('servicio', [
                    'Desarrollo de Páginas web' => 'Desarrollo de Páginas web',
                    'E-commerce' => 'E-commerce',
                    ], $cotizacione->servicio, ['class' => 'form-control form-select' . ($errors->has('servicio') ? ' is-invalid' : ''),'placeholder' => 'Seleccione servicio']) }}
                {!! $errors->first('servicio', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('planes') }}</label>
            <div>
                {{ Form::select('planes', [
                    'Básico' => 'Básico',
                    'Prémium' => 'Prémium',
                    'Empresarial' => 'Empresarial',
                    ], $cotizacione->planes, ['class' => 'form-control form-select' . ($errors->has('planes') ? ' is-invalid' : ''),'placeholder' => 'Seleccione plan']) }}
                {!! $errors->first('planes', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('importe') }}</label>
            <div>
                {{ Form::text('importe', $cotizacione->importe, ['class' => 'form-control' .
                ($errors->has('importe') ? ' is-invalid' : ''), 'placeholder' => 'Importe']) }}
                {!! $errors->first('importe', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('descuento') }}</label>
            <div>
                {{ Form::text('descuento', $cotizacione->descuento, ['class' => 'form-control' .
                ($errors->has('descuento') ? ' is-invalid' : ''), 'placeholder' => 'Descuento']) }}
                {!! $errors->first('descuento', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group mb-3">
            <div class="form-check">
                {{ Form::checkbox('aplicar_descuento_adicional', 1, false, ['class' => 'form-check-input', 'id' => 'aplicar_descuento_adicional']) }}
                <label class="form-check-label" for="aplicar_descuento_adicional">{{ Form::label('aplicar_descuento_adicional', 'Aplicar Servicio Adicional') }}</label>
            </div>
        </div>
    </div>
    <!-- Campos de servicio adicional e importe adicional -->
    <div class="col-md-6" id="campos_servicio_adicional" style="display: none;">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('servicio adicional') }}</label>
            <div>
                {{ Form::text('servicioadicional', $cotizacione->servicioadicional, ['class' => 'form-control' .
                ($errors->has('servicioadicional') ? ' is-invalid' : ''), 'placeholder' => 'Servicio adicional']) }}
                {!! $errors->first('servicioadicional', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3" id="campos_importe_adicional" style="display: none;">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('importe adicional') }}</label>
            <div>
                {{ Form::text('importeadicional', $cotizacione->importeadicional, ['class' => 'form-control' .
                ($errors->has('importeadicional') ? ' is-invalid' : ''), 'placeholder' => 'Importe adicional']) }}
                {!! $errors->first('importeadicional', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('descripcion') }}</label>
            <div>
                {{ Form::textarea('descripcion', $cotizacione->descripcion, ['class' => 'form-control' .
                ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Agregar descripcion ...']) }}
                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                <small class="form-hint">cotizacione <b>descripcion</b> instruction.</small>
            </div>
        </div>
        <div class="form-footer">
            <div class="text-end">
                <div class="d-flex">
                    <button type="reset" href="#" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-rotate icon-tabler icon-tabler-rotate-clockwise-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 4.55a8 8 0 0 1 6 14.9m0 -4.45v5h5" /><path d="M5.63 7.16l0 .01" /><path d="M4.06 11l0 .01" /><path d="M4.63 15.1l0 .01" /><path d="M7.16 18.37l0 .01" /><path d="M11 19.94l0 .01" /></svg>
                        Limpiar
                    </button>
                    <button type="submit" class="btn btn-primary ms-auto ajax-submit">
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
                $('#campos_servicio_adicional, #campos_importe_adicional').show();
            } else {
                // Ocultar campos de servicio adicional e importe adicional
                $('#campos_servicio_adicional, #campos_importe_adicional').hide();
            }
        });
    });
</script>
