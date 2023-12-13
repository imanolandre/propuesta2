<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('Nombre del cliente') }}</label>
            <div>
                {{ Form::text('nombrecliente', $cliente->nombrecliente, ['class' => 'form-control' . ($errors->has('nombrecliente') ? ' is-invalid' : ''), 'placeholder' => 'Nombrecliente']) }}
                {!! $errors->first('nombrecliente', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('Correo Electrónico') }}</label>
            <div>
                {{ Form::text('correo', $cliente->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
                {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('Teléfono') }}</label>
            <div>
                {{ Form::text('teléfono', $cliente->teléfono, ['class' => 'form-control' . ($errors->has('teléfono') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono']) }}
                {!! $errors->first('teléfono', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('Nombre de la empresa') }}</label>
            <div>
                {{ Form::text('empresa', $cliente->empresa, ['class' => 'form-control' . ($errors->has('empresa') ? ' is-invalid' : ''), 'placeholder' => 'Empresa']) }}
                {!! $errors->first('empresa', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('Sitio Web') }}</label>
            <div>
                {{ Form::text('sitioweb', $cliente->sitioweb, ['class' => 'form-control' . ($errors->has('sitioweb') ? ' is-invalid' : ''), 'placeholder' => 'Sitio web']) }}
                {!! $errors->first('sitioweb', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('Dirección') }}</label>
            <div>
                {{ Form::text('dirección', $cliente->dirección, ['class' => 'form-control' . ($errors->has('dirección') ? ' is-invalid' : ''), 'placeholder' => 'Dirección']) }}
                {!! $errors->first('dirección', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
</p>
<div class="hr"></div>
<p>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('Razón Social') }}</label>
            <div>
                {{ Form::text('razónsocial', $cliente->razónsocial, ['class' => 'form-control' .
                ($errors->has('razónsocial') ? ' is-invalid' : ''), 'placeholder' => 'Razónsocial']) }}
                {!! $errors->first('razónsocial', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('Dirección Fiscal') }}</label>
            <div>
                {{ Form::text('direcciónfiscal', $cliente->direcciónfiscal, ['class' => 'form-control' .
                ($errors->has('direcciónfiscal') ? ' is-invalid' : ''), 'placeholder' => 'Direcciónfiscal']) }}
                {!! $errors->first('direcciónfiscal', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('RFC') }}</label>
            <div>
                {{ Form::text('rfc', $cliente->rfc, ['class' => 'form-control' .
                ($errors->has('rfc') ? ' is-invalid' : ''), 'placeholder' => 'Rfc']) }}
                {!! $errors->first('rfc', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('Codigo Postal') }}</label>
            <div>
                {{ Form::text('codigopostal', $cliente->codigopostal, ['class' => 'form-control' .
                ($errors->has('codigopostal') ? ' is-invalid' : ''), 'placeholder' => 'Codigopostal']) }}
                {!! $errors->first('codigopostal', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('Regimen de Incorporación') }}</label>
            <div>
                {{ Form::select('regimenincorporación', [
                    'Alternativa 1' => 'Alternativa 1',
                    'Alternativa 2' => 'Alternativa 2',
                    'Alternativa 3' => 'Alternativa 3',
                    'Alternativa 4' => 'Alternativa 4',
                    ], $cliente->regimenincorporación, ['class' => 'form-control form-select' . ($errors->has('regimenincorporación') ? ' is-invalid' : ''),'placeholder' => 'Seleccione en tipo de regimen']) }}
                {!! $errors->first('regimenincorporación', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="form-group form3">
        <div  class="form-label">{{ Form::label('constancia de situación Fiscal (CSF)') }}</div>
        <label>
            {{ Form::file('constanciasituaciónFiscal', ['class' =>'form-control form-label' . ($errors->has('constanciasituaciónFiscal') ? ' is-invalid' : '')]) }}
        </label>
        @if($cliente->constanciasituaciónFiscal)
        <div class="form-label">Archivo actual: {{ $cliente->constanciasituaciónFiscal }}</div>
        @endif
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
