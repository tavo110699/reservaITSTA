<div class="flex">
    <x-hyper-button route="{{ route($route .'.edit', $id )}}" type="edit" label="Edit"></x-hyper-button>

    <form action="{{ route($route .'.destroy', $id)}}" method="post">
        @csrf @method('DELETE')
        <x-button class="bg-red-500 hover:bg-red-700" label="Remove" type="delete"/>
    </form>
</div>
