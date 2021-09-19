<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full grid grid-cols-1">
    <div>
        @if(session()->has('success'))
            <x-action-message title="Success" type="success">
                {{ session()->get('success')  }}
            </x-action-message>
        @elseif(session()->has('warning'))
            <x-action-message title="Warning" type="warning">
                {{ session()->get('warning')  }}
            </x-action-message>
        @elseif(session()->has('error'))
            <x-action-message title="Error" type="error">
                {{ session()->get('error')  }}
            </x-action-message>
        @endif
    </div>
    <div class="flex flex-row">
        <div class="mx-auto bg-white shadow rounded mr-5 w-5/12">
            {{ $action }}
        </div>
        <div class="bg-white overflow-hidden shadow rounded w-7/12 p-5">
            {{ $slot }}
        </div>
    </div>
</div>
