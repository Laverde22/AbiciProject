<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallefactura extends Model
{
    use HasFactory;
    protected $primaryKey = 'idDetallefactura';
    protected $fillable = ['idDetalllefactura','idpedido','idproveedor','idfactura','TipoServicio','ValorProductos','ValorServicios','ValorTotal','created_at'];
}
