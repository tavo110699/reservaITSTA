@extends('Desktop.sabores.resources.views.admin.template')
@section('titulo','Administrador de usuarios')
@section('contenido')

    <div class="container">

        <div class="page-header text-center">
            <h1>Lugares
                <small>[Agregar lugar]</small>
            </h1>
        </div>

        <div class="row">

            <div class="col-6 offset-3">

                <div class="card">

                    <div class="card-body">

                        @if(count($errors)>0)
                            @include('Desktop.sabores.resources.views.admin.secciones.errores')
                        @endif

                        <form action="{{route('user.store')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="active" value="1">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input class="form-control" type="text" name="name" id="name" required
                                       placeholder="Ingrese el nombre">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electronico</label>
                                <input class="form-control" type="email" name="email" id="email" required
                                       placeholder="Ingrese el correo electronico">
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo de cuenta</label>
                                <select name="tipo" id="tipo" class="form-control" required>
                                    <option value="user">Usuario</option>
                                    <option value="admin">Administrador</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <textarea required name="direccion" id="direccion" class="form-control"></textarea>

                            </div>

                            <div class="form-group text-center m-2">
                                <button type="submit" class="btn btn-success m-1">Guardar</button>
                                <a href="{{route('user.index')}}" class="btn btn-warning m-1">Cancelar</a>
                            </div>

                        </form>
                    </div>

                </div>


            </div>


        </div>


    </div>
@endsection
