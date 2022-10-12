<?php

namespace App\Http\Livewire\Categoria;

use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Facades\Redirect;

class CrearCategoria extends Component
{

    public $mostrarFormulario = false;
    public $nombre;

    public function mostrarFormulario()
    {
        $this->mostrarFormulario = true;
    }

    public function guardarCategoria()
    {
        $categoria = new Categoria();
        $categoria->nombre = $this->nombre;
        $categoria->save();
        return Redirect::route('categorias.index')->with("message", "Categoría añadida con exito");
    }

    public function render()
    {
        return view('livewire.categoria.crear-categoria');
    }
}
