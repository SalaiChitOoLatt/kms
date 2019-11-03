<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

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
        return view('admin.user-edit')->with('users', $users);
    }

    public function userupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $users->update();

        return redirect('/admin/users')->with('status', 'User has been updated successfully.');
    }

    public function userdelete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/admin/users')->with('status', 'User has been deleted successfully.');

    }

    public function about()
    {
        return view('admin.about');
    }
}
