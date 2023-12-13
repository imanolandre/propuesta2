<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombrecliente
 * @property $correo
 * @property $teléfono
 * @property $empresa
 * @property $sitioweb
 * @property $dirección
 * @property $razónsocial
 * @property $rfc
 * @property $direcciónfiscal
 * @property $codigopostal
 * @property $regimenincorporación
 * @property $constanciasituaciónFiscal
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    public function setNombreclienteAttribute($value)
    {
        $this->attributes['nombrecliente'] = ucwords($value);
    }
    public function setEmpresaAttribute($value)
    {
        $this->attributes['empresa'] = ucwords($value);
    }
    public function setRazónsocialAttribute($value)
    {
        $this->attributes['razónsocial'] = ucwords($value);
    }
    public function setDirecciónAttribute($value)
    {
        $this->attributes['dirección'] = ucwords($value);
    }
    public function setDirecciónfiscalAttribute($value)
    {
        $this->attributes['direcciónfiscal'] = ucwords($value);
    }

    static $rules = [
		'nombrecliente' => 'required',
        'correo' => 'required',
        'teléfono' => 'required',
        'empresa' => 'required',
        'sitioweb' => 'required',
        'dirección' => 'required',
        'razónsocial' => 'nullable',
        'rfc' => 'nullable',
        'direcciónfiscal' => 'nullable',
        'codigopostal' => 'nullable',
        'regimenincorporación' => 'nullable',
        'constanciasituaciónFiscal' => 'nullable|file|mimes:pdf|max:10240',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombrecliente','correo','teléfono','empresa','sitioweb','dirección','razónsocial','rfc','direcciónfiscal','codigopostal','regimenincorporación','constanciasituaciónFiscal'];


}
