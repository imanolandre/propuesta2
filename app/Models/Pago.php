<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 *
 * @property $id
 * @property $fecha
 * @property $proyecto_id
 * @property $cliente
 * @property $monto
 * @property $gastosingreso
 * @property $conceptogasto
 * @property $diezmo
 * @property $libre
 * @property $metodopago
 * @property $adjunto
 * @property $created_at
 * @property $updated_at
 *
 * @property Proyecto $proyecto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pago extends Model
{
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    static $rules = [
		'fecha' => 'required',
		'proyecto_id' => 'required',
		'cliente' => 'required',
		'monto' => 'required',
		'gastosingreso' => 'required',
		'conceptogasto' => 'required',
		'metodopago' => 'required',
		'adjunto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','proyecto_id','cliente','monto','gastosingreso','conceptogasto','diezmo','libre','metodopago','adjunto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */


}
