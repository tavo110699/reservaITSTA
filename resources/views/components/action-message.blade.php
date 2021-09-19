<div class="@if($type === 'error')bg-red-200 border-red-500 text-red-900
@elseif( $type==="success")bg-teal-100 border-teal-500 text-teal-900
@elseif( $type==="warning")bg-yellow-100 border-yellow-500 text-yellow-900
@endif border-t-4 rounded-b 0 px-4 mb-5 py-3 shadow-md" role="alert">
    <div class="flex">
        <div class="py-1"><svg class="fill-current h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div>
            <p class="font-bold">{{ $title }}</p>
            <p class="text-sm">{{ $slot }}</p>
        </div>
    </div>
</div>
