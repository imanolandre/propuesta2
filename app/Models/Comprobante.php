<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comprobante
 *
 * @property $id
 * @property $cotizacion_id
 * @property $documento
 * @property $servicio
 * @property $total
 * @property $anticipo
 * @property $descripcion
 * @property $cuentaorigen
 * @property $conceptopago
 * @property $metodopago
 * @property $foliooperacion
 * @property $fechaoperacion
 * @property $adjunto
 * @property $created_at
 * @property $updated_at
 *
 * @property Cotizacione $cotizacione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Comprobante extends Model
{
    
    static $rules = [
		'cotizacion_id' => 'required',
		'documento' => 'required',
		'servicio' => 'required',
		'total' => 'required',
		'anticipo' => 'required',
		'descripcion' => 'required',
		'cuentaorigen' => 'required',
		'conceptopago' => 'required',
		'metodopago' => 'required',
		'foliooperacion' => 'required',
		'fechaoperacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cotizacion_id','documento','servicio','total','anticipo','descripcion','cuentaorigen','conceptopago','metodopago','foliooperacion','fechaoperacion','adjunto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cotizacione()
    {
        return $this->hasOne('App\Models\Cotizacione', 'id', 'cotizacion_id');
    }
    

}
