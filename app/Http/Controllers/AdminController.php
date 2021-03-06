<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Category;
use App\Role;

class AdminController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function userlists()
    {
        $users= User::all();
        return view('admin.userlist')->with('users', $users);
    }

    
    public function useredit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.user-edit')->with(compact('users', 'roles'));
    }

    public function userupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->role()->associate($request['role']);
        $users->update();

        return redirect('/admin/users')->with('status', 'User has been updated successfully.');
    }

    public function userdelete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/admin/users')->with('status', 'User has been deleted successfully.');

    }

    public function showUserCreateForm()
    {
        $roles = Role::all();
        return view('admin.create-user')->with('roles', $roles);
    }

    public function createUser(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:12', 'min:9'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // $user= User::insert([

        //     'name' => $request->input('name'),

        //     'phone' => $request->input('phone'),

        //     'email' => $request->input('email'),
            
        //     'usertype' => $request->input('usertype'),

        //     'password' => Hash::make($request->input('password')),
            
        //     ]);

            $user= new User();
            $user->name = $request['name'];
            $user->phone = $request['phone'];
            $user->email = $request['email'];
            $user->role()->associate($request['role']);
            $user->password = Hash::make($request['password']);
            $user->save();
        return redirect('/admin/users')->with('status', 'A New User has been created successfully.');
    }

    public function showRoleCreateForm()
    {
        return view('admin.role.create');
    }

    public function downloadcsv()
    {
        $users = User::get(); // All users
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($users, ['name' => 'Name', 'phone' => 'Phone Number', 'usertype' => 'User Type', 'email' => 'Email'])->download('user list.csv');
    }


    
}
