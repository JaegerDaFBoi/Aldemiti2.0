<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = "ventas";

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'productos_ventas', 'fk_venta', 'fk_producto')->withPivot('cantidad', 'valor_total');
    }
    
}
