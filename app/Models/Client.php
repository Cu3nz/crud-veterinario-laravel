<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nombre' , 'apellidos' , 'telefono' , 'email' , 'direccion']; //? Estoy definiendo los atributos que se puede, crear, borrar y modificar y por lo tanto sin esto el php artisan migrate --seed no funciona.
    use HasFactory;
}
