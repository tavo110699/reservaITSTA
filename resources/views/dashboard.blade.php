<x-app-layout>

    <!-- This banner requires Tailwind CSS v2.0+ -->
    <div class="bg-indigo-600" x-data="{show:true}" x-show="show">
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 flex items-center">
        <span class="flex p-2 rounded-lg bg-indigo-800">
          <!-- Heroicon name: outline/speakerphone -->
          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
          </svg>
        </span>
                    <p class="ml-3 font-medium text-white truncate">
                        <span class="hidden md:inline">
           Te recordamos que para eliminar o modificar un evento debes ser la persona quien lo reservo o pedir a el administrador del sitio

          </span>

                    </p>
                </div>
                <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                    <!-- Button trigger modal -->
                    <a href="#"  data-toggle="modal" data-target="#exampleModalLong" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-indigo-50">
                        Leer mas
                    </a>

                </div>
                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                    <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2" @click="show=false">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- end banner  -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Por fines de seguridad, si tienes algun evento de manera urgente, notificar a la persona que ocupa
                    dicho espacio o notificar directamente a las personas encargadas de administrar el sitio web
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <!-- Calendar JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.css">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/locales-all.js"></script>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
                Agregar evento
            </button>

            <!-- Modal -->
            <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="evento"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Agregar evento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <!-- <form action=""> -->
                            <form action="" id="formAgenda">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="title">Titulo</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                           aria-describedby="helpId"
                                           placeholder="Escribe el titulo del evento">
                                </div>

                                <div class="form-group">
                                    <label for="description">Descripción:</label>
                                    <textarea class="form-control" name="description" id="description"
                                              rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="start">Fecha de inicio:</label>
                                    <input type="datetime-local" class="form-control" name="start" id="start"
                                           aria-describedby="helpId"
                                           placeholder="">
                                    <small id="helpId" class="form-text text-muted">Selecciona la fecha de inicio del
                                        evento</small>
                                </div>

                                <div class="form-group">
                                    <label for="end">Fecha de clausura</label>
                                    <input type="datetime-local" class="form-control" name="end" id="end"
                                           aria-describedby="helpId"
                                           placeholder="">
                                    <small id="helpId" class="form-text text-muted">Coloca la fecha en la que termina el
                                        evento</small>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" id="btnDelete">Eliminar</button>
                            <button type="button" class="btn btn-warning" id="btnEdit">Modificar</button>
                            <button type="button" class="btn btn-primary" id="btnSave">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-jet-welcome /> -->

                <div class="container">
                    <div id="agenda"></div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/agenda.js')}}" defer></script>
    </div>
</x-app-layout>
