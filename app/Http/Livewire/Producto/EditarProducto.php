<?php

namespace App\Http\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class EditarProducto extends Component
{

    public $idproducto;
    public $categoria;
    public $codigo;
    public $nombre;
    public $unidadmedida;
    public $valorcompra;
    public $valorventa;
    public $stock;
    public $proveedor;
    public $editarCantidad = false;

    protected $rules = [
        'categoria' => 'required',
        'proveedor' => 'nullable',
        'codigo' => 'required|numeric',
        'nombre' => 'required',
        'unidadmedida' => 'nullable',
        'valorcompra' => 'required|numeric',
        'valorventa' => 'required|numeric',
        'stock' => 'required|numeric'
    ];

    protected $messages = [
        'categoria.required' => 'Debe seleccionar una categoria de producto',
        'codigo.required' => 'El campo Codigo es requerido',
        'codigo.numeric' => 'El campo Codigo solo debe tener numeros',
        'nombre.required' => 'El campo Nombre de producto es requerido',
        'valorcompra.required' => 'El campo Valor de producto es requerido',
        'valorcompra.numeric' => 'El campo Valor de producto solo debe tener numeros',
        'valorventa.required' => 'El campo Valor de venta es requerido',
        'valorventa.numeric' => 'El campo Valor de venta solo debe tener numeros',
        'stock.required' => 'El campo Cantidad en inventario es requerido',
        'stock.numeric' => 'El campo Cantidad en inventario solo debe tener numeros'
    ];

    public function mount(Producto $producto)
    {
        $this->idproducto = $producto->id;
        $this->categoria = $producto->fk_categoria;
        $this->codigo = $producto->codigo;
        $this->nombre = $producto->nombre;
        $this->unidadmedida = $producto->unidad_medida;
        $this->valorcompra = $producto->valor_compra;
        $this->valorventa = $producto->valor_venta;
        $this->stock = $producto->cantidad;
        $this->proveedor = $producto->fk_proveedor;
    }

    public function editarProducto()
    {
        $this->validate();
        $producto = Producto::find($this->idproducto);
        $producto->codigo = $this->codigo;
        $producto->nombre = $this->nombre;
        $producto->unidad_medida = $this->unidadmedida;
        $producto->valor_compra = $this->valorcompra;
        $producto->valor_venta = $this->valorventa;
        $producto->cantidad = $this->stock;
        $producto->fk_proveedor = $this->proveedor;
        $producto->fk_categoria = $this->categoria;
        $producto->save();
        return Redirect::route('inventario.index')->with("message", "Producto actualizado con exito");
    }

    public function render()
    {
        return view('livewire.producto.editar-producto', [
            'categorias' => Categoria::all(),
            'proveedores' => Proveedor::all()
        ]);
    }
}
