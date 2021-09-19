<x-list-layout-s>
    <x-slot name="action">
        @if($update)
            <x-livewire.role_action function="update()" :edit="$update" :permissions="$permissions" type="edit" label="Update" btclass="bg-green-500 hover:bg-green-700"></x-livewire.role_action>
        @else
            <x-livewire.role_action function="store()" label="Create" :permissions="$permissions" type="add" btclass="bg-blue-500 hover:bg-blue-700"></x-livewire.role_action>
        @endif
    </x-slot>

    <table class="min-w-full table-fixed">
        <thead>
        <tr>
            @for ($i = 0; $i < count($columns); $i++)
                <x-list-table-header>
                    {{ $columns[$i] }}
                </x-list-table-header>
            @endfor
            <x-list-table-header style="width: 100px">Action</x-list-table-header>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach ($roles as $role)
            <tr>
                <x-list-table-data>
                    {{ $role->name }}
                </x-list-table-data>

                <x-list-table-data>
                    {{ $role->created_at }}
                </x-list-table-data>

                <x-list-table-data>
                    <div class="flex items-center">
                        <x-button wire:click="edit({{$role->id}})" label="Edit" type="edit" class="mr-2 bg-green-400 hover:bg-green-700"/>
                        <x-button wire:click="destroy({{$role->id}})" label="Delete" type="delete" class="bg-red-400 hover:bg-red-700"/>
                    </div>
                </x-list-table-data>
            </tr>
        @endforeach
        </tbody>
    </table>

</x-list-layout-s>
