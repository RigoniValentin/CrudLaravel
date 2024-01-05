@extends('layout/plantilla')

@section("titulopagiona","Crear un nuevo registro")

@section('contenido')
<div class="card">
    <h5 class="card-header">Actualizar nueva persona</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{route('personas.update', $personas->id)}}" method="POST">
            @csrf
            @method("PUT")
                <label for="">Apellido paterno</label>
                <input type="text" name="paterno" class="form-control" required value="{{$personas->paterno}}">
                <label for="">Apellido materno</label>
                <input type="text" name="materno" class="form-control" required value="{{$personas->materno}}">
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="{{$personas->nombre}}">
                <label for="">fecha_nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" required value="{{$personas->fecha_nacimiento}}">
                <br>
                <a href="{{route("personas.index")}}" class="btn btn-info">
                    <span class="fas fa-undo-alt"></span> Regresar
                </a>
                <button class="btn btn-warning">Actualizar</button>
            </form>
        </p>
    </div>
</div>
@endsection
