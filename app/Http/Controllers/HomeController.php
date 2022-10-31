<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $user = \Auth::user();
        //dd($user->id);
        //$role = Role::where('slug','author')->first();
        //dd($role);
        //$user->roles()->attach($role);
        //dd($user->roles);
        //dd($user->hasRole('author'));

        // check permission 
        //$permission = Permission::first();
        //$user->permissions()->attach($permission);
        //dd($user->permissions);
        dd($user->hasPermission('add_post'));
        dd($user->hasPermission('delete_post'));
        //dd($user->can('add_post'));  //not working
        //dd($user->getAllRoles(2));


        return view('home');
    }
}
