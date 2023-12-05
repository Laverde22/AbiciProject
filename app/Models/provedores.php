<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provedores extends Model
{
    use HasFactory;
    protected $primaryKey = 'IdProvedor';
    protected $fillable =['IdProvedor','Nombre','Nit','Telefono','Correo','tipo','Logo'];
}
