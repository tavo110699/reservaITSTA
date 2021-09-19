<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{asset('img/itsta_black_logo.png')}}" style="width: 150px; height: 150px;">

        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <h1>Datos personales</h1>
                <hr>
            </div>
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" required  />
            </div>
            <div class="mt-4">
                <x-jet-label for="apPaterno" value="{{ __('apellido paterno') }}" />
                <x-jet-input id="apPaterno" class="  w-full" type="text" name="apPaterno" required  />
            </div>

            <div class="mt-4">
                <x-jet-label for="apMaterno" value="{{ __('apellido materno') }}" />
                <x-jet-input id="apMaterno" class="  w-full" type="text" name="apMaterno" required  />
            </div>

            <div class="mt-4">
                <x-jet-label for="Telefono" value="{{ __('Telefono') }}" />
                <x-jet-input id="Telefono" class="  w-full" type="number" name="Telefono" required  />
            </div>
            <div class="mt-4">
                <x-jet-label for="RFC" value="{{ __('RFC') }}" />
                <x-jet-input id="RFC" class="  w-full" type="text" name="RFC" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required  />
            </div>
            <div class="mt-4">
                <x-jet-label for="CURP" value="{{ __('CURP') }}" />
                <x-jet-input id="CURP" class="  w-full" type="text" name="CURP"onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required  />
            </div>
            <div class="mt-4">
                <x-jet-label for="fechaNacimiento" value="{{ __('Fecha de nacimiento:') }}" />
                <x-jet-input id="fechaNacimiento" class="  w-full" type="date" name="fechaNacimiento" required  />
            </div>

            <div class="mt-4">
                <h1>Datos profesionales</h1>
                <hr>
            </div>

            <div class="mt-4">
                <x-jet-label for="gradoAcademico" value="{{ __('Grado academico:') }}" />
                <select name="gradoAcademico" class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                    <option  selected>Elige una opción</option>
                    <option value="Licenciatura">Licenciatura</option>
                    <option value="Ingenieria">Ingenieria</option>
                    <option value="Maestria">Maestria</option>
                    <option value="Doctorado">Doctorado</option>
                </select>

            </div>

            <div class="mt-4">
                <x-jet-label for="carreraProfesional" value="{{ __('carrera Profesional:') }}" />
                <x-jet-input id="carreraProfesional" class="  w-full" type="text" name="carreraProfesional" required autofocus autocomplete="carreraProfesional"  />
            </div>

            <div class="mt-4">
                <x-jet-label for="puesto" value="{{ __('Puesto actual de trabajo:') }}" />
                <x-jet-input id="puesto" class="  w-full" type="text" name="puesto" required  autofocus autocomplete="puesto"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>


</x-guest-layout>
