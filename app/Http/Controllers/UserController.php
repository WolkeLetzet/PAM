<?php

namespace App\Http\Controllers;

use App\Models\User;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    public function __contruct()
    {
        $this->middleware(['role:admin|user']);
    }

    public function forgeOfGods($id)
    {
        $newGod = User::find($id);
        $newGod->assignRole('admin');
        $newGod->givePermissionTo('all');

        return redirect(RouteServiceProvider::HOME);
    }

    public function profile()
    {


        if (auth()->user()->hasRole('admin')) {
            return view('user.profile')->with('users', User::all());
        }
        return view('user.profile');
    }

    public function showAllUsers()
    {
        return view('user.admin.show')->with('users', User::all());
    }

    public function crearUsuario($flag = false)
    {

        return view('user.admin.new-user')->with('flag', $flag)->with('roles',Role::all('id','name'));
    }


    public function storeUsuario(Request $req)
    {



        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $req->get('name'),
            'email' => $req->get('email'),
            'password' => Hash::make($req->get('password')),
        ]);
        if ($req->roles) {
            $user->syncRoles($req->roles);
        } else {
            $user->assignRole('user');
        }


        return redirect(route('create-user'))->with("success","Usuario Creado Exitosamente");
    }


    public function changeRoles()
    {
        return view('user.admin.setting')->with('users', User::all())
            ->with('roles', Role::get('name'));
    }




    public function setRoles(Request $req)
    {
        $roles = $req->roles;
        $users=User::all();

        foreach($users as $user) { 

            if (array_key_exists($user->email,$roles)) {
                $user->syncRoles($roles[$user->email]);
            }else{
                $user->syncRoles([]);
            }
        }
        return redirect(route('all-user'));
    }

   
}
