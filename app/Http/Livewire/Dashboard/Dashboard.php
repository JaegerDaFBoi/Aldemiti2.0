<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Producto;
use App\Models\Venta;
use Livewire\Component;

class Dashboard extends Component
{


    public function render()
    {
        $productos = Producto::select('nombre', 'cantidad')->orderBy('created_at','DESC')->take(6)->get();
        $ventas = Venta::with('productos')->orderBy('created_at', 'DESC')->take(6)->get();
        return view('livewire.dashboard.dashboard',compact('productos', 'ventas'));
    }
}
