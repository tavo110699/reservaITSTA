<x-list-layout-s>
    <x-slot name="action">
        @if($updateMode)
            <x-livewire.permission_action function="update()" :edit="$updateMode" type="edit" label="Update" btclass="bg-green-500 hover:bg-green-700"></x-livewire.permission_action>
        @else
            <x-livewire.permission_action function="store()" label="Create" type="add" btclass="bg-blue-500 hover:bg-blue-700"></x-livewire.permission_action>
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
            <x-list-table-header style="width: 100px">
                Action
            </x-list-table-header>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach ($data as $row)
            <tr>
                <x-list-table-data>
                    {{ $row->name }}
                </x-list-table-data>

                <x-list-table-data>
                    {{ $row->created_at }}
                </x-list-table-data>

                <x-list-table-data>
                    <div class="flex items-center">
                        <x-button wire:click="edit({{$row->id}})" label="Edit" type="edit" class="mr-2 bg-green-400 hover:bg-green-600"/>
                        <x-button wire:click="destroy({{$row->id}})" label="Delete" type="delete" class="bg-red-400 hover:bg-red-600"/>
                    </div>
                </x-list-table-data>
            </tr>
        @endforeach
        </tbody>
    </table>

</x-list-layout-s>
