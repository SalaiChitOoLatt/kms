<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Content;

class ContentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }

    public function index()
    {
        // $contents= Content::all();
        // return view('admin.content.index')->with('contents', $contents);
        return view('admin.content.index');
    }

    public function create()
    {
        return view('admin.content.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'content_name' => 'required',
            'description' => 'required'
            ]);         
       
        $content= new Content();
        $content->content_name = $request['content_name'];
        $content->description = $request['description'];
        // add other fields
        $content->save();

        return redirect('/content')->with('status', 'A New content has been created successfully.');

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
        $csvExporter->build($roles, ['role_name', 'description'])->download('role list.csv');
    }
    
}
