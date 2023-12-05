<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $codigo_producto
 * @property $detalle_producto
 * @property $foto_producto
 * @property $precio_costo
 * @property $precio_venta
 * @property $precio_docena
 * @property $marcas_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{

    static $rules = [
		'codigo_producto' => 'required',
		'detalle_producto' => 'required',
		'foto_producto' => 'required',
		'precio_costo' => 'required',
		'precio_venta' => 'required',
		'precio_docena' => 'required',
        'marcas_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo_producto','detalle_producto','foto_producto','precio_costo','precio_venta','precio_docena','marcas_id'];


    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marcas_id');
        return $this->hasOne('App\Models\Marca', 'id', 'marcas_id');
    }

}
