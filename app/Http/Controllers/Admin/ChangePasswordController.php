<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input as input;
use App\Http\Controllers\Controller;

class ChangePasswordController extends Controller
{
    public function index ()
    {
        return view('Admin.change_password');
    }

    public function update ()
    {
        $user = User::find(Auth::user()->id);

        if (Hash::check(Input::get('passwordOld'), $user['password']) && Input::get('password') == Input::get('password_confirmation')){
            $user->password = bcrypt(Input::get('password'));
            $user->save();
            return back()->with('success','رمز عبور با موفیت تغییر کرد');
        }
        else {
            return back()->with('error','رمز عبور شما تغییر نکرد...');
        }

    }
}
