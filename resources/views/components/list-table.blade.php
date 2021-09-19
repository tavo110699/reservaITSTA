<!-- component -->
<div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
    <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hiddene px-12">
        <div class="flex justify-between">
            <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                <x-search-box/>
            </div>
        </div>
    </div>
    <div class="align-middle inline-block min-w-full overflow-hidden px-8 pt-3 rounded-bl-lg rounded-br-lg">
        <table class="min-w-full table-fixed"">
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
            @foreach ($permissions as $permission)
                <tr>
                    <x-list-table-data>
                        {{ $permission->name }}
                    </x-list-table-data>

                    <x-list-table-data>
                        {{ $permission->created_at }}
                    </x-list-table-data>

                    <x-list-table-data>
                        <x-action-buttons model="permission" :id="$permission->id" />
                    </x-list-table-data>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
            <div>
            </div>
            <div>
            </div>
        </div>
    </div>
</div>
