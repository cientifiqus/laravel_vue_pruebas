@extends('layouts.main')
@section('cabecera')
    Listado de tareas
    <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">Nueva tarea</a>
@endsection
@section('contenido')
    <div>
        @include('tasks.partials.form')
    </div>
@endsection
