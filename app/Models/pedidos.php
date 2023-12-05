<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    use HasFactory;
    protected $primaryKey = 'idpedido';
    protected $fillable = ['idpedido','idcliente','iddomiciliario','idadministracion','direccion','fechahora','productos','tiempoestimadomin','horaestimada','descripcionproductos','estado','created_at'];
}
