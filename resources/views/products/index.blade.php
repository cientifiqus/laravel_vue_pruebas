@extends('layouts.main')
@section('cabecera')
    Listado de productos
    <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">Nuevo producto</a>
@endsection
@section('contenido')
    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <table class="table table-hover table-sm">
        <thead>
            <th>

            </th>
            <th>
                Descripción
            </th>
            <th>
                Precio
            </th>
            <th>
                Acción
            </th>
        </thead>
        <tbody>
            @foreach($Products as $key => $product)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>
                <td>
                    {{ $product->description }}
                </td>
                <td>
                    {{ $product->price }}
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <a href="javascript: document.getElementById('delete-{{ $product->id }}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                    <form id="delete-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
