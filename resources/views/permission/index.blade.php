<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('main.manage') }} {{ __('main.permission') }}s
        </h2>
    </x-slot>
    <div class="py-10">
        @livewire('permission-component')
    </div>
</x-app-layout>
