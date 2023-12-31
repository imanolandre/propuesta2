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

    public function setClienteAttribute($value)
    {
        $this->attributes['cliente'] = ucwords($value);
    }
    public function setServicioAdicional1Attribute($value)
    {
        $this->attributes['servicioadicional1'] = ucwords($value);
    }
    public function setServicioAdicional2Attribute($value)
    {
        $this->attributes['servicioadicional2'] = ucwords($value);
    }
    public function setServicioAdicional3Attribute($value)
    {
        $this->attributes['servicioadicional3'] = ucwords($value);
    }
    public function setServicioAdicional4Attribute($value)
    {
        $this->attributes['servicioadicional4'] = ucwords($value);
    }
    public function setServicioAdicional5Attribute($value)
    {
        $this->attributes['servicioadicional5'] = ucwords($value);
    }
    static $rules = [
		'servicio' => 'required',
		'importe' => 'required',
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
    protected $fillable = ['folio','servicio','importe','descuento','planes','cliente','descripcion','servicioadicional1','importeadicional1','servicioadicional2','importeadicional2','servicioadicional3','importeadicional3','servicioadicional4','importeadicional4','servicioadicional5','importeadicional5','documento','anticipo','anticipoadi','anticipototal','total'];



}
