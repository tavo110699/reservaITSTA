@extends('adminlte::page')

@section('title', 'Sitios | Admin')

@section('content_header')
    <div>
        @if (\Session::has('mensaje'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('mensaje') !!}</li>
                </ul>
            </div>
        @endif
    </div>
    <h1>Lugares</h1>
@stop

@section('content')
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <a class="btn btn-primary" href="{{route('places.create')}}">Nuevo Sitio <i class="fas fa-plus"></i></a>
            </h1>
        </div>
    </div>

    <div class="container text-center">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Capacidad Maxima</th>
                    <th>Localizacion</th>
                    <th>Encargado</th>
                    <th>Fecha de creación</th>
                    <th>Ultima actualizacion</th>

                </tr>
                </thead>
                <tbody>
                @foreach($places as $places)
                    <tr>
                        <td>
                            <button onclick="location.href = '{{route('places.edit', [$places->id])}}'"
                                    class="btn btn-warning text-white">
                                <i class="far fa-edit"></i>
                            </button>
                        </td>
                        <td>

                            <button onclick="document.getElementById('deleteUser{{$places->id}}').submit()"
                                    class="btn btn-danger text-white">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            <form id="deleteUser{{$places->id}}" action="{{route('places.destroy', [$places->id])}}"
                                  method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$places->id}}">
                            </form>
                        </td>
                        <td>{{$places->id}}</td>
                        <td>{{$places->name}}</td>
                        <td>{{$places->capacidadMax}}</td>
                        <td>{{$places->localizacion}}</td>
                        @foreach($encargado as $encargado)
                            <td>{{$encargado->getUser->name}}</td>
                        @endforeach

                        <td>{{date("Y-m-d",strtotime($places->created_at))}}</td>
                        <td>{{date("Y-m-d",strtotime($places->updated_at))}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Estas en el index de lugares'); </script>
@stop


