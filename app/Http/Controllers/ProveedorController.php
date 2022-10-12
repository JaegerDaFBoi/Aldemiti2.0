<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreProveedor' => ['required', 'alpha'],
            'apellidosProveedor' => ['required', 'alpha'],
            'telContacto' => ['required', 'numeric'],
            'telAdicional' => ['nullable', 'numeric'],
            'nombreEmpresa' => ['nullable', 'alpha_num'],
            'direccionProveedor' => ['nullable', 'alpha_num']
        ],
        [
            'nombreProveedor.required' => 'El campo Nombre es requerido',
            'nombreProveedor.alpha' => 'El campo Nombre solo debe tener caracteres alfabeticos',
            'apellidosProveedor.required' => 'El campo Apellidos es requerido',
            'apellidosProveedor.alpha' => 'El campo Apelidos solo debe tener caracteres alfabeticos',
            'telContacto.required' => 'El campo Telefono de Contacto es requerido',
            'telContacto.numeric' => 'El campo Telefono de Contacto solo debe tener numeros',
            'telAdicional.numeric' => 'El campo Telefono Adicional solo debe tener numeros',
            'nombreEmpresa.alpha_num' => 'El campo Nombre de Empresa solo debe tener caracteres alfanumericos',
            'direccionProveedor.alpha_num' => 'El campo Nombre de Empresa solo debe tener caracteres alfanumericos',
        ]);
        $proveedor = new Proveedor();
        $proveedor->nombres = $request->input('nombreProveedor');
        $proveedor->apellidos = $request->input('apellidosProveedor');
        $proveedor->telcontacto = $request->input('telContacto');
        $proveedor->tel_adicional = $request->input('telAdicional');
        $proveedor->direccion = $request->input('direccionProveedor');
        $proveedor->isIndependiente = $request->has('esIndependiente');
        $proveedor->nombre_empresa = $request->input('nombreEmpresa');
        $proveedor->save();
        return Redirect::route('proveedor.index')->with("message", "Proveedor registrado con exito");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombreProveedor' => ['required', 'alpha'],
            'apellidosProveedor' => ['required', 'alpha'],
            'telContacto' => ['required', 'numeric'],
            'telAdicional' => ['nullable', 'numeric'],
            'nombreEmpresa' => ['nullable', 'alpha_num'],
            'direccionProveedor' => ['nullable', 'alpha_num']
        ],
        [
            'nombreProveedor.required' => 'El campo Nombre es requerido',
            'nombreProveedor.alpha' => 'El campo Nombre solo debe tener caracteres alfabeticos',
            'apellidosProveedor.required' => 'El campo Apellidos es requerido',
            'apellidosProveedor.alpha' => 'El campo Apelidos solo debe tener caracteres alfabeticos',
            'telContacto.required' => 'El campo Telefono de Contacto es requerido',
            'telContacto.numeric' => 'El campo Telefono de Contacto solo debe tener numeros',
            'telAdicional.numeric' => 'El campo Telefono Adicional solo debe tener numeros',
            'nombreEmpresa.alpha_num' => 'El campo Nombre de Empresa solo debe tener caracteres alfanumericos',
            'direccionProveedor.alpha_num' => 'El campo Nombre de Empresa solo debe tener caracteres alfanumericos',
        ]);
        $proveedor->nombres = $request->input('nombreProveedor');
        $proveedor->apellidos = $request->input('apellidosProveedor');
        $proveedor->telcontacto = $request->input('telContacto');
        $proveedor->tel_adicional = $request->input('telAdicional');
        $proveedor->direccion = $request->input('direccionProveedor');
        $proveedor->isIndependiente = $request->has('esIndependiente');
        $proveedor->nombre_empresa = $request->input('nombreEmpresa');
        $proveedor->save();
        return Redirect::route('proveedor.index')->with("message", "Proveedor actualizado con exito");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return Redirect::route('proveedor.index')->with("message", "Proveedor eliminado con exito");
    }
}
