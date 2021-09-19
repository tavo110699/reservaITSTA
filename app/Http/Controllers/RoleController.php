<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    function __construct()
    {
        $this->middleware(['role:System Admin']);
    }
    public function index(){
        $columns = array('Name', 'Created Date');
        $roles = Role::all();
        $permissions = Permission::get();
        return view('roles.index', compact('columns', 'roles', 'permissions'));
    }
}
