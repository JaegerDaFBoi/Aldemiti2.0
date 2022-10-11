<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
    use HasFactory;

    protected $table = "retiros";

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'fk_producto');
    }
}
