<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuario'; // Nombre de tu tabla de usuarios

    // Si tu tabla no sigue las convenciones de nombre de columnas predeterminadas, especifica las columnas aquí
    protected $fillable = [
        'nombre',
        'rut',
        'correo',
        'id_rol',
        'id_estado',
        'password' // Asegúrate de tener un campo de contraseña
    ];

    protected $hidden = [
        'password',
    ];
}
