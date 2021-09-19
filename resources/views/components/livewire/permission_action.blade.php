<x-form-simple>
    @if($type === "add")
        <x-slot name="title">
            {{ __('Create a new permission') }}
        </x-slot>
    @else
        <x-slot name="title">
            {{ __('Editing permission') }}
        </x-slot>
    @endif
    <x-slot name="form">
        <div class=" pb-20">
            <input wire:model="name" class="w-full rounded-lg p-2  mr-0 text-gray-800 bg-white mr-2 @if(count($errors)>0)focus:outline-none border-2 border-red-700 @else border border-gray-200 @endif" placeholder="Permission name"/>
            @error('name') <span class="text-red-700 text-s">{{ $message }}</span> @enderror
        </div>
    </x-slot>
    <x-slot name="actions">
        <x-button wire:click="{{ $function }}" type="{{ $type }}" label="{{ $label }}" class="{{ $btclass }}"/>
        @if(isset($edit))
            <x-livewire.button wire:click="clear()" label="Cancel" type="refresh" class="ml-2"/>
        @endif
    </x-slot>
</x-form-simple>

