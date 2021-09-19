<div {{ $attributes->merge(['class' => 'relative h-full']) }}>
    <div class="p-5">
        <h1 class="border-b-2 border-gray-400 pb-4">{{ isset($title) ? $title : "Form" }}</h1>
    </div>
    <div class="p-5 w-full">
        {{ $form }}
    </div>

    @if (isset($actions))
        <div class="absolute rounded-b inset-x-0 bottom-0 flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
            {{ $actions }}
        </div>
    @endif
</div>
