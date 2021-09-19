<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleComponent extends Component
{
    public $roles, $name, $selected, $columns, $permissions;
    public $grantedPermissions = [];
    public $update = false;

    protected $rules = [
        'name' => 'required|min:5|unique:roles,name',
        'selected' => 'required|numeric',
        'grantedPermissions' => 'required',
    ];

    public function render()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
        $this->columns = array('Name', 'Created At');
        return view('livewire.role.component');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->selected = null;
        $this->resetValidation();
        $this->grantedPermissions = [];
        $this->update = false;
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
        $role = Role::create([
            'name' => $this->name,
        ]);
        $role->syncPermissions($this->grantedPermissions);

        session()->flash('success', 'Permission successfully created.');
        $this->resetInput();
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->selected = $id;
        $this->name = $role->name;
        $this->grantedPermissions = $role->permissions->pluck('id')->all();
        $this->update = true;
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'required|min:5|unique:roles,name,' . $this->selected,
            'selected' => 'required|numeric',
            'grantedPermissions' => 'required',
        ]);

        if ($this->selected) {
            $role = Role::findOrFail($this->selected);
            $role->update([
                'name' => $this->name,
            ]);
            $role->syncPermissions($this->grantedPermissions);
            session()->flash('success', "The $role->name permission successfully updated.");
            $this->resetInput();
        }
    }

    public function destroy($id)
    {
        if ($id) {
            if($id == 1){
                session()->flash('error', "You cannot delete System Admin role");
            }
            else{
                $record = Role::findOrFail($id);
                $name = $record->name;
                $record->delete();
                session()->flash('warning', "The $name permission successfully deleted.");
            }
        }

    }
}
