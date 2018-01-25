<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function getProfile()
    {
        $admin = Auth::guard('admin') -> user();

        return view('admin.page.profile', compact('admin'));
    }

    public function postProfile(Request $req)
    {
        $admin = Auth::guard('admin') -> user();

        if (Input::file('image'))
        {
            if (!empty($admin['image']))
            {
                @unlink($admin['image']);
            }

            Input::file('image') -> move('admins/'.$admin['id'].'/',Input::file('image') -> getClientOriginalName());
            $path = 'admins/'.$admin['id'].'/'.Input::file('image') -> getClientOriginalName();

            $admin -> image = $path;
        }
        $admin -> name = $req -> input('name');
        $admin -> username = $req -> input('username');

        $admin -> save();

        return redirect('/dashboard/admin-profile');
    }

    public function postPass(Request $req)
    {
        if (Auth::guard('admin') -> attempt(['password' => $req -> input('old')]))
        {
            $admin = Auth::guard('admin') -> user();

            $admin -> password = bcrypt($req -> input('new'));

            $admin -> save();

            Auth::guard('admin') -> logout();

            return redirect('/dashboard');
        }
        else
        {
            return redirect('/dashboard/admin-profile') -> with('fail', 'The Old Password Incorrect!!');
        }
    }
}
