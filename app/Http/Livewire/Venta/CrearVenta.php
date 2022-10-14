<?php

namespace App\Http\Livewire\Venta;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class CrearVenta extends Component
{

    public $fechaventa;
    public $productosavender;
    public $mostrar = false;
    public $idproducto;
    public $nombreproducto;
    public $valorproducto;
    public $cantidad;
    public $valortotal;

    public function seleccionarProducto($id)
    {
        $this->reset('idproducto', 'nombreproducto', 'valorproducto', 'cantidad', 'valortotal');
        $this->mostrar =  true;
        $producto = Producto::find($id);
        $this->idproducto = $producto->id;
        $this->nombreproducto = $producto->nombre;
        $this->valorproducto = $producto->valor_venta;
    }

    public function añadirProducto()
    {
        $this->validate(
            [
                'cantidad' => 'required|numeric'
            ],
            [
                'cantidad.required' => 'El campo Cantidad es requerido',
                'cantidad.numeric' => "El campo cantidad solo debe tener numeros"
            ]
        );
        if (empty($this->productosavender)) {
            $this->productosavender = collect([[
                'id' => $this->idproducto,
                'nombre' => $this->nombreproducto,
                'valorventa' => $this->valorproducto,
                'cantidad' => $this->cantidad,
                'valortotal' => $this->valortotal
            ]]);
        } else {
            $this->productosavender->push([
                'id' => $this->idproducto,
                'nombre' => $this->nombreproducto,
                'valorventa' => $this->valorproducto,
                'cantidad' => $this->cantidad,
                'valortotal' => $this->valortotal
            ]);
        }
    }

    public function quitarProducto($i)
    {
        $this->reset('idproducto', 'nombreproducto', 'valorproducto', 'cantidad', 'valortotal');
        $this->productosavender->pull($i);
    }

    public function guardarProductos()
    {
        $this->validate([
            'fechaventa' => 'required|date',
        ], [
            'fechaventa.required' => 'El campo Fecha de venta es requerido'
        ]);
        $venta = new Venta();
        $venta->fecha_venta = $this->fechaventa;
        $venta->save();
        foreach ($this->productosavender as $producto) {
            $venta->productos()->attach($producto['id'], ['cantidad' => $producto['cantidad'], 'valor_total' => $producto['valortotal']]);
            $productoVenta = Producto::find($producto['id']);
            $productoVenta->cantidad = $productoVenta->cantidad - $producto['cantidad'];
            $productoVenta->save();
        }
        return Redirect::route('ventas.index')->with("message", "Venta registrada con exito");
    }

    public function calcularValorTotal()
    {
        $this->valortotal = $this->cantidad * $this->valorproducto;
    }

    public function render()
    {
        return view('livewire.venta.crear-venta', [
            'productos' => Producto::all()
        ]);
    }
}
