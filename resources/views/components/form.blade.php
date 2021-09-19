<div {{ $attributes->merge(['class' => 'grid gap-6']) }}>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form method="POST" action="{{ $action }}">
            @if( isset($method))
                @method($method)
            @endif
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        {{ $form }}
                    </div>
                </div>

                @if (isset($actions))
                    <div class="flex items-center inset-x-0 bottom-0 justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        {{ $actions }}
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
