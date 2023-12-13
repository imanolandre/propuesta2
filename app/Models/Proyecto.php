<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proyecto
 *
 * @property $id
 * @property $nombre
 * @property $tipo
 * @property $cotización
 * @property $cliente_id
 * @property $fechainicio
 * @property $fechafin
 * @property $prototipo
 * @property $requerimientos
 * @property $descripción
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proyecto extends Model
{
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucwords($value);
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    static $rules = [
		'nombre' => 'required',
		'tipo' => 'required',
		'cotización' => 'required',
		'cliente_id' => 'required',
		'fechainicio' => 'required',
		'fechafin' => 'required',
		'prototipo' => 'required',
		'requerimientos' => 'required',
		'descripción' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','tipo','cotización','cliente_id','fechainicio','fechafin','prototipo','requerimientos','descripción'];

}
