<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionComponent extends Component
{
    public $data, $name, $selected, $columns;
    public $updateMode = false;

    protected $rules = [
        'name' => 'required|min:5|unique:permissions',
        'selected' => 'required|numeric',
    ];

    public function render()
    {
        $this->data = Permission::all();
        $this->columns = array('Name', 'Created At');
        return view('livewire.permission.component');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->selected = null;
        $this->resetValidation();
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function clear(){
        $this->resetInput();
        $this->updateMode = false;
    }

    public function store()
    {
        $this->validate();
        Permission::create([
            'name' => $this->name,
        ]);
        session()->flash('success', 'Permission successfully created.');
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Permission::findOrFail($id);
        $this->selected = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'required|min:5|unique:permissions,name,' . $this->selected,
            'selected' => 'required|numeric',
        ]);

        if ($this->selected) {
            $record = Permission::findOrFail($this->selected);
            $record->update([
                'name' => $this->name,
            ]);
            session()->flash('success', "The $this->name permission successfully updated.");
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Permission::findOrFail($id);
            $name = $record->name;
            $record->delete();
            session()->flash('warning', "The $name permission successfully deleted.");

        }

    }
}
