<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cheque
 *
 * @property $id
 * @property $no_cheque
 * @property $fecha_cobro
 * @property $foto_ch
 * @property $estados_id
 * @property $facturas_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Empresa $empresa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cheque extends Model
{

    static $rules = [
		'no_cheque' => 'required',
		'fecha_cobro' => 'required',
        'facturas_id' => 'required',
        'foto_ch' => 'required',
        'estados_id' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['no_cheque','fecha_cobro','facturas_id','foto_ch','estados_id'];

    public function facturas()
    {
        return $this->belongsTo(Factura::class);
    }

    public function calendario()
    {
        // Obtén las fechas de cobro de la tabla de cheques
        $fechasCobro = Cheque::pluck('fecha_cobro');

        return view('calendario', compact('fechasCobro'));
    }
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresas_id');
        return $this->belongsTo(Empresa::class, 'empresas_id');

    }
}