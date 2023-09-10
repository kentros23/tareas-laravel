@extends('app')

@section('content')
<div class="container w-25 border p-4 mt-4"> 
        <form action="{{ route('todos-update', ['id' => $todo ->id])}}" method="POST">
        @method('PATCH')
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

            <div class="mb-3">
                <label for="title" class="form-label">Titulo de la tarea</label>
                <input type="text" name="title" class="form-control" value= "{{ $todo->title}}">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de vencimiento</label>
                <input type="text" name="fecha" class="form-control" value= "{{ $todo->fecha}}">
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label" >Estado de la tarea</label>
                <input type="text" name="estado" class="form-control" value= "{{ $todo->estado}}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar tarea</button>
        </form>

        
@endsection