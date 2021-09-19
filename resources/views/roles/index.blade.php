<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('main.manage') }} {{ __('main.role') }}s
        </h2>
    </x-slot>
    <div class="py-10">
        @livewire('role-component')
    </div>
</x-app-layout>
