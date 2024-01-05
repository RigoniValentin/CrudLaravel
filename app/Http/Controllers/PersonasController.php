<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    public function index()
    {
        //pagina de inicio\
        $datos = Personas::all();
        return view('inicio', compact('datos'));
    }

    public function create()
    {
        //el formulario donde agregamos datos 
        return view('agregar');
    }

    public function store(Request $request)
    {
        //Aqui guardamos datos en la DB.
        $personas = new Personas();
        $personas->paterno          = $request->post('paterno');
        $personas->materno          = $request->post('materno');
        $personas->nombre           = $request->post('nombre');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        return redirect()->route('personas.index')->with('success','Agregado con exito!');
    }

    public function show($id)
    {
        //Nos permite obtener un registro de nuestra tabla.
        $personas = Personas::find($id);
        return view("eliminar", compact('personas'));
    }

    public function edit($id)
    {
        //Sirve para traer los datos que se van a editar y los coloca en un formulario.
        //return view("actualizar");
        $personas = Personas::find($id);
        return view("actualizar", compact('personas'));
    }

    public function update(Request $request, $id)
    {
        //Actualiza los datos en la DB.
        $personas = Personas::find($id);
        $personas = new Personas();
        $personas->paterno          = $request->post('paterno');
        $personas->materno          = $request->post('materno');
        $personas->nombre           = $request->post('nombre');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        return redirect()->route('personas.index')->with('success','Actualizado con exito!');
    }

    public function destroy($id)
    {
        //Elimina un registro. 
        $personas = Personas::find($id);
        $personas->delete();
        return redirect()->route("personas.index")->with("success","Eliminado con exito");
    }
}
