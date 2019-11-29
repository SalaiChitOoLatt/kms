<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $roles= Role::all();
        return view('admin.role.index')->with('roles', $roles);
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'role_name' => 'required',
            'description' => 'required'
            ]);         
       
        $role= new Role();
        $role->role_name = $request['role_name'];
        $role->description = $request['description'];
        // add other fields
        $role->save();

        return redirect('/role')->with('status', 'A New role has been created successfully.');

    }

    public function edit(Request $request, $id)
    {
        $roles = Role::findOrFail($id);
        return view('admin.role.edit')->with('roles', $roles);
    }

    public function update(Request $request, $id)
    {
        $roles = Role::find($id);
        $roles->role_name = $request->input('role_name');
        $roles->description = $request->input('description');
        $roles->update();

        return redirect('/role')->with('status', 'Role has been updated successfully.');
    }


    public function destroy($id)
    {
        $roles = Role::findOrFail($id);
        $roles->delete();

        return redirect('/role')->with('status', 'Role has been deleted successfully.');
    }

    public function downloadcsv()
    {
        $roles = Role::get(); // All users
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($roles, ['role_name' => 'Role Name', 'description' => 'Description'])->download('role list.csv');
    }
    
}
