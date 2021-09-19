<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(['role:System Admin']);
    }

    public function index(){
        $this->authorize('manage', Permission::class);
        $columns = array('Name', 'Created Date');
        $permissions = Permission::all();
        return view('permission.index', [
            'permissions' => $permissions,
            'columns' => $columns
        ]);
    }
}
