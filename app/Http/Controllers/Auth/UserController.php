<?php

namespace App\Http\Controllers\Auth;

use App\Models\Company;
use App\Models\MainCategory;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $req)
    {
        if (Auth::guard('web') -> attempt(['email' => strtolower($req -> input('email')), 'password' => $req -> input('password')]))
        {
            return redirect('/user/profile');
        }
        else if (Auth::guard('company') -> attempt(['email' => strtolower($req -> input('email')), 'password' => $req -> input('password')]))
        {
            return redirect('/company/profile');
        }
        else if (Auth::guard('admin') -> attempt(['username' => strtolower($req -> input('email')), 'password' => $req -> input('password')]))
        {
            return redirect('/dashboard/home');
        }
        else
        {
            $notification = array(
                'message' => 'Invalid E-mail or Password !! 😓',
                'alert-type' => 'error'
            );

            return Redirect('/login') -> with($notification);
        }
    }

    public function getRegister()
    {
        $country = Country::all();
        $cat = MainCategory::all();

        return view('auth.register', compact('country', 'cat'));
    }

    public function postRegisterUser(Request $req)
    {
        $this -> validate($req, [
            'email' => 'unique:users|unique:companies',
        ]);
        $user = new User([
            'fname' => str_replace(' ', '', $req -> input('fname')),
            'lname' => str_replace(' ', '', $req -> input('lname')),
            'email' => str_replace(' ', '', strtolower($req -> input('email'))),
            'password' => bcrypt($req -> input('password')) ,
            'phone' => $req -> input('phone'),
            'country' => $req -> input('country'),
            'field' => $req -> input('field'),
            'skill' => $req -> input('skill'),
        ]);

        $user -> save();

//        $user = User::where('email', strtolower($req -> input('email'))) -> first();
//
//        return redirect('/tests/start/'.$req -> input('skill').'/'.$user['id']);
        return redirect('/user/profile');
    }

    public function postRegisterCompany(Request $req)
    {
        $this -> validate($req, [
            'email' => 'unique:companies|unique:users' ,
        ]);
        $com = new Company([
            'name' => str_replace(' ', '', $req -> input('name')),
            'email' => str_replace(' ', '', strtolower($req -> input('email'))),
            'password' => bcrypt($req -> input('password')) ,
            'phone' => $req -> input('phone'),
            'country' => $req -> input('country'),
            'address' => $req -> input('address'),
            'field' => $req -> input('field'),
            'url' => $req -> input('url'),
        ]);

        $com->save();

        return redirect('/company/profile');
    }

    public function getLogout($user)
    {
        Auth::guard($user) -> logout();
        return redirect('/');
    }
}
