<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';

    protected $fillable = [
        'nombre_producto',
        'codigo_barra',
        'descripcion',
        'vigencia',
        'fecha_vencimiento',
        'fecha_registro',
        'precio_compra',
        'precio_venta',
        'cantidad',
        'id_proveedor',
        'id_categoria',
        'id_marca',
        'id_usuario',
    ];

    public $timestamps = false;
}
