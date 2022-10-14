<?php

namespace App\Http\Livewire\Producto;

use App\Models\Ingreso;
use App\Models\Producto;
use App\Models\Retiro;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Carbon\Carbon;

class TablaProductos extends Component
{

    public $productos;
    public $formularioIngreso = false;
    public $formularioRetiro = false;
    public $productoSeleccionado;
    public $fechaIngreso;
    public $cantidadIngreso;
    public $valortotal;
    public $fechaRetiro;
    public $cantidadRetiro;
    public $valorretiro;
    public $observacion;
    public $fechaactual;

    public function mount($productos)
    {
        $this->productos = $productos;
        $this->fechaactual = Carbon::now();
    }

    public function mostrarFormulario($id)
    {
        if ($this->formularioRetiro == true) {
            $this->formularioRetiro = false;
        }
        $this->formularioIngreso = true;
        $this->productoSeleccionado = Producto::find($id);
    }

    public function mostrarFormularioRetiro($id)
    {
        if ($this->formularioIngreso == true) {
            $this->formularioIngreso = false;
        }
        $this->formularioRetiro = true;
        $this->productoSeleccionado = Producto::find($id);
    }

    public function cerrarFormulario()
    {
        $this->formularioIngreso = false;
        $this->formularioRetiro = false;
    }

    public function calcularValorTotal()
    {
        if ($this->formularioIngreso) {
            $this->valortotal = $this->productoSeleccionado->valor_compra * $this->cantidadIngreso;
        } elseif ($this->formularioRetiro) {
            $this->valorretiro = $this->productoSeleccionado->valor_compra * $this->cantidadRetiro;
        }
    }

    public function guardarIngreso()
    {
        $this->validate(
            [
                'fechaIngreso' => 'required|date',
                'cantidadIngreso' => 'required|numeric',
            ],
            [
                'fechaIngreso.required' => 'El campo Fecha de ingreso es requerido',
                'fechaIngreso.date' => 'El campo Fecha de ingreso debe ser una fecha válida',
                'cantidadIngreso.required' => 'El campo Cantidad es requerido',
                'cantidadIngreso.numeric' => 'El campo Cantidad solo debe contener numeros'
            ]
        );
        $ingreso = new Ingreso();
        $ingreso->fecha_ingreso = $this->fechaIngreso;
        $ingreso->fk_producto = $this->productoSeleccionado->id;
        $ingreso->cantidad = $this->cantidadIngreso;
        $ingreso->valor_total = $this->valortotal;
        $ingreso->save();
        $producto = $this->productoSeleccionado;
        $producto->cantidad = $producto->cantidad + $this->cantidadIngreso;
        $producto->save();
        return Redirect::route('inventario.index')->with("message", "Ingreso registrado con exito.");
    }

    public function guardarRetiro()
    {
        $this->validate(
            [
                'fechaRetiro' => 'required|date',
                'cantidadRetiro' => 'required|numeric',
            ],
            [
                'fechaRetiro.required' => 'El campo Fecha de retiro es requerido',
                'fechaRetiro.date' => 'El campo Fecha de retiro debe ser una fecha válida',
                'cantidadRetiro.required' => 'El campo Cantidad es requerido',
                'cantidadRetiro.numeric' => 'El campo Cantidad solo debe contener numeros'
            ]
        );
        $retiro = new Retiro();
        $retiro->fecha_retiro = $this->fechaRetiro;
        $retiro->fk_producto = $this->productoSeleccionado->id;
        $retiro->cantidad = $this->cantidadRetiro;
        $retiro->valor_total = $this->valorretiro;
        $retiro->observacion = $this->observacion;
        $retiro->save();
        $producto = $this->productoSeleccionado;
        $producto->cantidad = $producto->cantidad - $this->cantidadRetiro;
        $producto->save();
        return Redirect::route('inventario.index')->with("message", "Retiro registrado con exito.");
    }

    public function render()
    {
        return view('livewire.producto.tabla-productos');
    }
}
