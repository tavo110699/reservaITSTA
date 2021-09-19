@extends('adminlte::page')

@section('title', 'Crear sitio | Admin ITSTA')

@section('content_header')
    <div>
        @if (session()->has('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
    </div>
    <div class="page-header text-center">
        <h1>Sitios
            <small>[Agregar sitio]</small>
        </h1>
    </div>
@stop

@section('content')


    <div class="container">

        <div class="row">

            <div class="col-6 offset-3">

                <div class="card">

                    <div class="card-body">

                    <form action="{{route('places.store')}}" method="POST">

                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required
                                       placeholder="Ingrese el nombre">
                            </div>
                            <div class="form-group">
                                <label for="capacidad">Capacidad Maxima</label>
                                <input class="form-control" type="number" name="capacidad" id="capacidad" required
                                       placeholder="Ingrese la capacidad maxima">
                            </div>

                            <div class="form-group">
                                <label for="localizacion">Localizacion:</label>
                                <textarea required name="localizacion" id="localizacion"
                                          class="form-control"></textarea>
                            </div>

                        <div class="form-group">
                            <label for="idUser">Encargado:</label>
                            <select name="idUser" id="idUser" class="form-control">
                                @foreach($usuarios as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>

                            <div class="form-group text-center m-2">
                                <button type="submit" class="btn btn-success m-1">Guardar</button>
                                <a href="{{route('places.index')}}" class="btn btn-warning m-1">Cancelar</a>
                            </div>

                        </form>
                    </div>

                </div>


            </div>


        </div>


    </div>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Estas en crear Lugar!'); </script>
@stop







