<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Marca
 *
 * @property $id
 * @property $nombre_marca
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Marca extends Model
{
    
    static $rules = [
		'nombre_marca' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_marca'];



}
