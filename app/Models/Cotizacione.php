<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cotizacione
 *
 * @property $id
 * @property $servicio
 * @property $importe
 * @property $descuento
 * @property $planes
 * @property $cliente
 * @property $descripcion
 * @property $servicioadicional
 * @property $importeadicional
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cotizacione extends Model
{

    static $rules = [
		'servicio' => 'required',
		'importe' => 'required',
		'descuento' => 'required',
		'planes' => 'required',
		'cliente' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['servicio','importe','descuento','planes','cliente','descripcion','servicioadicional','importeadicional','documento','anticipo','anticipoadi','anticipototal','total'];



}
