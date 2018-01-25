<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;

class FormController extends Controller
{
    public function getHome()
    {
        return view('admin.content.home');
    }

    public function getAdmin()
    {
        $admin = Admin::all();

        return view('admin.form.admin', compact('admin'));
    }

    public function getDelete($id)
    {
        Admin::find($id) -> delete();

        return redirect('dashboard\view-admins');
    }

    public function getAddAdmin()
    {
        return view('admin.form.addAdmin');
    }

    public function postAddAdmin(Request $req)
    {
        $admin = new Admin([
            'name' => $req -> input('name'),
            'username' => $req -> input('username'),
            'password' => bcrypt($req -> input('password')),
        ]);
        $admin -> save();

        return view('admin.form.addAdmin');
    }
}
