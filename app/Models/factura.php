<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    use HasFactory;
    protected $primaryKey = 'idFactura';
    protected $fillable =['idFactura','idCliente','FechaHora'];
}
