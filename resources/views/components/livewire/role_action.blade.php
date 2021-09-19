<x-form-simple>
    @if($type === "add")
        <x-slot name="title">
            {{ __('Create a new role') }}
        </x-slot>
    @else
        <x-slot name="title">
            {{ __('Editing role') }}
        </x-slot>
    @endif
    <x-slot name="form">
        <div class="w-full">
            <input type="hidden" wire:model="selected">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-input wire:model="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}"/>
            @error('name') <span class="text-red-700 text-s">{{ $message }}</span> @enderror
        </div>
        <div class="w-full pb-20">
            <div class="grid grid-cols-2 gap-2">
                @foreach($permissions as $permission)
                    <label class="mt-3">
                        <input type="checkbox" wire:model="grantedPermissions" class="form-checkbox h-5 w-5 text-blue-600" value="{{ $permission->id }}"><span class="ml-2 text-gray-700">{{ $permission->name }}</span>
                    </label>
                @endforeach
            </div>
            @error('grantedPermissions') <span class="text-red-700 text-s">{{ $message }}</span> @enderror
        </div>
    </x-slot>
    <x-slot name="actions">
        <x-button wire:click="{{ $function }}" type="{{ $type }}" label="{{ $label }}" class="{{ $btclass }}"/>
        @if(isset($edit))
            <x-livewire.button wire:click="clear()" label="Cancel" type="refresh" class="ml-2"/>
        @endif
    </x-slot>
</x-form-simple>

