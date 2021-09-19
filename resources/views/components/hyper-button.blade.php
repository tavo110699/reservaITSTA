<a  href="{{ $route }}" {{ $attributes->merge(['class' => 'flex items-center text-white py-1 mx-2 px-4 w-auto h-8 bg-gray-500 rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none']) }}>
    @if (isset($type))
        <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" fill="currentColor" class="w-4 h-4 inline-block mr-1 align-middle">
        @if($type === "create")
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
        @elseif($type === "edit")
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
        @endif
        </svg>
    @endif
    <span>{{ $label }}</span>
</a>
