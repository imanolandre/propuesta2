<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('nombre del proyecto') }}</label>
            <div>
                {{ Form::text('nombre', $proyecto->nombre, ['class' => 'form-control' .
                ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('tipo de proyecto') }}</label>
            <div>
                {{ Form::select('tipo', [
                    'Startup' => 'Startup',
                    'Empresarial' => 'Empresarial',
                    'Corporativo' => 'Corporativo',
                    'Escalable' => 'Escalable',
                    ], $proyecto->tipo, ['class' => 'form-control form-select' . ($errors->has('tipo') ? ' is-invalid' : ''),'placeholder' => 'Seleccione el tipo de proyecto']) }}
                {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('servicio') }}</label>
            <div>
                {{ Form::select('cotización', [
                    'Desarrollo web' => 'Desarrollo web',
                    'Diseño digital' => 'Diseño digital',
                    'E-commerce' => 'E-commerce',
                    'Marketing digital' => 'Marketing digital',
                    'Desarrollo de Software' => 'Desarrollo de Software',
                    'Aplicaciones Móviles' => 'Aplicaciones Móviles',
                    ], $proyecto->cotización, ['class' => 'form-control form-select' . ($errors->has('cotización') ? ' is-invalid' : ''),'placeholder' => 'Seleccione en tipo de servicio']) }}
                {!! $errors->first('cotización', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('cliente_id', 'Nombre del Cliente') }}</label>
            <div>
                {{ Form::select('cliente_id', $clientes, $proyecto->cliente_id, ['class' => 'form-control form-select' . ($errors->has('cliente_id') ? ' is-invalid' : ''),'placeholder' => 'Selecciona un cliente'])}}
                {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('fechainicio', 'Fecha de Inicio') }}</label>
            <div>
                {{ Form::date('fechainicio', $proyecto->fechainicio, ['class' => 'form-control' .
                ($errors->has('fechainicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Inicio']) }}
                {!! $errors->first('fechainicio', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('fechafin', 'Fecha de Fin') }}</label>
            <div>
                {{ Form::date('fechafin', $proyecto->fechafin, ['class' => 'form-control' .
                ($errors->has('fechafin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Fin']) }}
                {!! $errors->first('fechafin', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="hr"></div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('prototipo') }}</label>
            <div>
                {{ Form::file('prototipo', ['class' =>'form-control form-label' . ($errors->has('prototipo') ? ' is-invalid' : '')]) }}
                {!! $errors->first('prototipo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            @if($proyecto->prototipo)
            <div class="form-label">Archivo actual: {{ $proyecto->prototipo }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('requerimientos') }}</label>
            <div>
                {{ Form::file('requerimientos', ['class' =>'form-control form-label' . ($errors->has('requerimientos') ? ' is-invalid' : '')]) }}
                {!! $errors->first('requerimientos', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            @if($proyecto->requerimientos)
            <div class="form-label">Archivo actual: {{ $proyecto->requerimientos }}</div>
            @endif
        </div>
    </div>
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('descripción') }}</label>
            <div>
                {{ Form::textarea('descripción', $proyecto->descripción, ['class' => 'form-control' .
                ($errors->has('descripción') ? ' is-invalid' : ''), 'placeholder' => 'Completar descripción ...']) }}
                {!! $errors->first('descripción', '<div class="invalid-feedback">:message</div>') !!}
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
