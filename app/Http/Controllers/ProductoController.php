<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('inventario.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('inventario.create', compact('categorias', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'categoriaProducto' => 'required',
                'proveedorProducto' => 'nullable',
                'codigoProducto' => 'required|numeric',
                'nombreProducto' => 'required',
                'unidadMedida' => 'nullable',
                'valorCompra' => 'required|numeric',
                'valorVenta' => 'required|numeric',
                'stockInventario' => 'required|numeric'
            ],
            [
                'categoriaProducto.required' => 'Debe seleccionar una categoria de producto',
                'codigoProducto.required' => 'El campo Codigo es requerido',
                'codigoProducto.numeric' => 'El campo Codigo solo debe tener numeros',
                'nombreProducto.required' => 'El campo Nombre de producto es requerido',
                'valorCompra.required' => 'El campo Valor de producto es requerido',
                'valorCompra.numeric' => 'El campo Valor de producto solo debe tener numeros',
                'valorVenta.required' => 'El campo Valor de venta es requerido',
                'valorVenta.numeric' => 'El campo Valor de venta solo debe tener numeros',
                'stockInventario.required' => 'El campo Cantidad en inventario es requerido',
                'stockInventario.numeric' => 'El campo Cantidad en inventario solo debe tener numeros'
            ]
        );
        $producto = new Producto();
        $producto->codigo = $request->input('codigoProducto');
        $producto->nombre = $request->input('nombreProducto');
        $producto->valor_compra = $request->input('valorCompra');
        $producto->valor_venta = $request->input('valorVenta');
        $producto->cantidad = $request->input('stockInventario');
        $producto->unidad_medida = $request->input('unidadMedida');
        $producto->fk_proveedor = $request->input('proveedorProducto');
        $producto->fk_categoria = $request->input('categoriaProducto');
        $producto->save();
        return Redirect::route('inventario.index')->with("message", "Producto creado con exito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('inventario.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return Redirect::route('inventario.index')->with("message", "Producto eliminado con exito");
    }
}
