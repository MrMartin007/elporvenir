<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Factura
 *
 * @property $id
 * @property $numero_factura
 * @property $monto
 * @property $foto_fac
 * @property $empresas_id
 * @property $estados_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property Empresa $empresa
 * @property Cheque $cheque
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Factura extends Model
{

    static $rules = [
		'numero_factura' => 'required',
		'monto' => 'required',
        'foto_fac' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['numero_factura','monto','empresas_id','estados_id','foto_fac'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'estados_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresas_id');
        return $this->belongsTo(Empresa::class, 'empresas_id');

    }

    public function cheque()
    {
        return $this->hasOne(Cheque::class, 'facturas_id');
    }
}
