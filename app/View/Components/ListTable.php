<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Spatie\Permission\Models\Permission;

class ListTable extends Component
{
    public $columns;
    public $permissions;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($columns, Collection $permissions)
    {
        $this->columns = $columns;
        $this->permissions = $permissions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.list-table');
    }
}
