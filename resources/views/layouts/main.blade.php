@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @yield('cabecera')
                    </div>
                    <div class="card-body">
                        @yield('contenido')
                    </div>
                    <div class="card-footer">
                        --
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
