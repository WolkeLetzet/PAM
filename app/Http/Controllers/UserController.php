<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Generator;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
        $faker=Container::getInstance()->make(Generator::class);

        return view('user.admin.new-user')->with('roles',Role::all('id','name'))->with('example',$faker);
    }


    public function storeUsuario(Request $req)
    {



        $this->userRegValidator($req->all())->validate();

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
        return redirect(route('all-user'))->with('success','Cambios Hechos con Exito');
    }
    public function userRegValidator($data)
    {
        return Validator::make($data,[
            "name"=>'required|string|max:255',
            "email"=>'required|string|email|max:255|unique:users',
            "password"=>['required','string','min:8','confirmed']

        ],[
            "required"=>"Este campo es obligatorio",
            "min"=> "La contraseña debe medir almenos :min caracteres",
            "confirmed"=>"Las contraseñas no coinciden",
            "unique"=>"Este :attribute ya esta en uso",
        ]);
    }
   
}
