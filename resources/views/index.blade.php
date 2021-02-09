@extends('layouts.main')
@section('cabecera')
    Esta es la raiz
@endsection
@section('contenido')
    <div>
        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm ">Productos</a>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm ">Tareas</a>
    </div>
@endsection
