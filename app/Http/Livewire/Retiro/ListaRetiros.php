<?php

namespace App\Http\Livewire\Retiro;

use App\Models\Producto;
use App\Models\Retiro;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class ListaRetiros extends Component
{

    public $retiros;
    public $mostrarFormulario = false;
    public $retiroSeleccionado;
    public $producto;
    public $fechaRetiro;
    public $cantidadRetiro;
    public $valorretiro;
    public $observacion;

    public function mount($retiros)
    {
        $this->retiros = $retiros;
    }

    public function mostrarFormulario($id)
    {
        $this->mostrarFormulario = true;
        $this->retiroSeleccionado = Retiro::find($id);
        $this->producto = Producto::find($this->retiroSeleccionado->fk_producto);
        $this->fechaRetiro = $this->retiroSeleccionado->fecha_retiro;
        $this->cantidadRetiro = $this->retiroSeleccionado->cantidad;
        $this->valorretiro = $this->retiroSeleccionado->valor_total;
        $this->observacion = $this->retiroSeleccionado->observacion;
    }

    public function cerrarFormulario()
    {
      $this->mostrarFormulario = false;
    }

    public function calcularValorTotal()
    {
        $this->valorretiro = $this->producto->valor_compra * $this->cantidadRetiro;
    }

    public function actualizarRetiro()
    {
        $this->validate([
            'fechaRetiro' => 'required|date|before:tomorrow',
            'cantidadRetiro' => 'required|numeric',
        ],
        [
            'fechaRetiro.required' => 'El campo Fecha de retiro es requerido',
            'fechaRetiro.date' => 'El campo Fecha de retiro debe ser una fecha válida',
            'fechaRetiro.before' => 'El campo Fecha de retiro no puede registrar una fecha mayor a la de hoy',
            'cantidadRetiro.required' => 'El campo Cantidad es requerido',
            'cantidadRetiro.numeric' => 'El campo Cantidad solo debe contener numeros'
        ]);
        $retiro = Retiro::find($this->retiroSeleccionado->id);
        $retiro->fecha_retiro = $this->fechaRetiro;
        $retiro->fk_producto = $this->producto->id;
        $producto = $this->producto;
        if ($this->cantidadRetiro > $retiro->cantidad) {
            $cantidadaretirar = $this->cantidadRetiro - $retiro->cantidad;
            $producto->cantidad = $producto->cantidad - $cantidadaretirar;
        } elseif ($this->cantidadRetiro < $retiro->cantidad) {
            $cantidadaingresar = $retiro->cantidad - $this->cantidadRetiro;
            $producto->cantidad = $producto->cantidad + $cantidadaingresar;
        }
        $retiro->cantidad = $this->cantidadRetiro;
        $retiro->valor_total = $this->valorretiro;
        $retiro->observacion = $this->observacion;
        $retiro->save();
        $producto->save();
        return Redirect::route('retiros.index')->with("message", "Registro de retiro actualizado con exito");
    }

    public function render()
    {
        return view('livewire.retiro.lista-retiros');
    }
}
