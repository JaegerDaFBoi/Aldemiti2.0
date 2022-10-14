<?php

namespace App\Http\Livewire\Ingreso;

use App\Models\Ingreso;
use App\Models\Producto;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class ListaIngresos extends Component
{

    public $ingresos;
    public $mostrarFormulario = false;
    public $ingresoSeleccionado;
    public $producto;
    public $fechaIngreso;
    public $cantidad;
    public $valortotal;

    public function mount($ingresos)
    {
      $this->ingresos = $ingresos;
    }

    public function mostrarFormulario($id)
    {
      $this->mostrarFormulario = true;
      $this->ingresoSeleccionado = Ingreso::find($id);
      $this->producto = Producto::find($this->ingresoSeleccionado->fk_producto);
      $this->fechaIngreso = $this->ingresoSeleccionado->fecha_ingreso;
      $this->cantidad = $this->ingresoSeleccionado->cantidad;
      $this->valortotal = $this->ingresoSeleccionado->valor_total;
    }

    public function cerrarFormulario()
    {
      $this->mostrarFormulario = false;
    }

    public function calcularValorTotal()
    {
      $this->valortotal = $this->producto->valor_compra * $this->cantidad;
    }

    public function actualizarIngreso()
    {
        $this->validate([
            'fechaIngreso' => 'required|date|before:tomorrow',
            'cantidad' => 'required|numeric',
        ],
        [
            'fechaIngreso.required' => 'El campo Fecha de ingreso es requerido',
            'fechaIngreso.date' => 'El campo Fecha de ingreso debe ser una fecha válida',
            'fechaIngreso.before' => 'El campo Fecha de ingreso no puede registrar una fecha mayor a la de hoy',
            'cantidad.required' => 'El campo Cantidad es requerido',
            'cantidad.numeric' => 'El campo Cantidad solo debe contener numeros'
        ]);
      $ingreso = Ingreso::find($this->ingresoSeleccionado->id);
      $ingreso->fecha_ingreso = $this->fechaIngreso;
      $ingreso->fk_producto = $this->producto->id;
      $producto = $this->producto;
      if ($this->cantidad > $ingreso->cantidad) {
        $cantidadaingresar = $this->cantidad - $ingreso->cantidad;
        $producto->cantidad = $producto->cantidad + $cantidadaingresar;
      } elseif ($this->cantidad < $ingreso->cantidad) {
        $cantidadarestar = $ingreso->cantidad - $this->cantidad;
        $producto->cantidad = $producto->cantidad - $cantidadarestar;
      }
      $ingreso->cantidad = $this->cantidad;
      $ingreso->valor_total = $this->valortotal;
      $ingreso->save();
      $producto->save();
      return Redirect::route('ingresos.index')->with("message", "Registro de ingreso actualizado con exito");

    }

    public function render()
    {
        return view('livewire.ingreso.lista-ingresos');
    }
}
