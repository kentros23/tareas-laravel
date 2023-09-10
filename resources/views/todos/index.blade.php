@extends('app')

@section('content')
<div class="container w-26 border p-4 mt-4"> 
        <form action="{{ route('todos')}}" method="POST">
            @csrf

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            @error('fecha')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            @error('estado')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <label for="title" class="form-label">Titulo de la tarea</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de vencimiento</label>
                <input type="text" name="fecha" class="form-control" placeholder="D/M/Y">
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado de la tarea</label>
                <input type="text" name="estado" class="form-control" placeholder="pendiente o completada">
            </div>
            
            <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
        </form>

        <div>
            @foreach ($todos as $todo)
                <div class="row py-1">
                    <div class="col-md-10 d-flex align-items-center">
                        <a href="{{ route('todos-edit', ['id'=> $todo->id])}}">{{ $todo->title }} para el {{ $todo->fecha }} {{ $todo->estado }}</a>   
                    </div>
                    <div class="col-md-1 d-flex align-items-rigth">
                        <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm ">Eliminar</button>    
                        </form>

                    </div>
    
                </div>
            @endforeach
        </div>
    </div>
@endsection