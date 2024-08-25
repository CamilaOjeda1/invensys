<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'venta';

    public function productos()
    {
        return $this->hasMany(VentaProducto::class, 'id_venta');
    }
    
    public $timestamps = false;
}
