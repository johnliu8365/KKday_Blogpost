<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    public function editPassword()
    {
        //
        return view('auth.passwords.edit');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();

        Validator::extend('checkHashedPass', function($attribute, $value, $parameters)
        {
            if( ! Hash::check( $value , $parameters[0] ) )
            {
                return false;
            }
            return true;
        }, 'Incorrect Current Password');

        Validator::make($input, [
            'old_password' => 'required|checkHashedPass:' . $user->password,
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ])->validate();

        User::find($user->id)->update([
            'password' => Hash::make($input['password']),
        ]);

        return redirect('/home');
    }
}
