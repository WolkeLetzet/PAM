<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //

    public function forgeOfGods ($id){
        $newGod=User::find($id);
        $newGod->assignRole('admin');
        $newGod->givePermissionTo('all');

        return redirect(RouteServiceProvider::HOME);
    }

    public function profile($id){
        $user=User::find($id);

        if($user->hasRole('admin')){
            return view('user.profile')->with('users',User::all());
        }
        return view('user.profile');
    }
}
