@extends('Desktop.sabores.resources.views.admin.template')
@section('titulo','Administrador de usuarios')
@section('contenido')
    <div class="container text-center">
        <div class="page-header">
            <h1>Usuarios
                <a class="btn btn-primary" href="{{route('user.create')}}">Nuevo Usuario <i class="fas fa-plus"></i></a>
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
                    <th>Correo electronico</th>
                    <th>Tipo</th>
                    <th>direccion</th>
                    <th>Fecha de creación</th>
                </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $user)
                    <tr>
                        <td>
                            <button onclick="location.href = '{{route('user.edit', [$user->id])}}'" class="btn btn-warning text-white">
                                <i class="far fa-edit"></i>
                            </button>
                        </td>
                        <td>

                            <button onclick="document.getElementById('deleteUser{{$user->id}}').submit()" class="btn btn-danger text-white">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            <form id="deleteUser{{$user->id}}" action="{{route('user.destroy', [$user->id])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$user->id}}">
                            </form>
                        </td>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{strtoupper($user->tipo)}}</td>
                        <td>{{$user->direccion}}</td>
                        <td>{{date("Y-m-d",strtotime($user->created_at))}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
