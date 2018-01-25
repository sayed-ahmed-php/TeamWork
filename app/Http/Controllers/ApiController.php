<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Auth;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function postLogin(Request $req)
    {
        $email = $req -> get('email');
        $pass = $req -> get('pass');

        if (Auth::guard('web') -> attempt(['email' => strtolower($email), 'password' => $pass]))
        {
            $user = User::where('email', $email) -> get() -> first();
            $res=array();
            $res['data']= $user;
            $res['success'] = 1;
            return response() -> json($res);
        }
        else if (Auth::guard('company') -> attempt(['email' => strtolower($email), 'password' => $pass]))
        {
            $com = Company::where('email', $email) -> get() -> first();
            $res = array();
            $res['data'] = $com;
            $res['success'] = 1;
            return response() -> json($res);
        }
        else
        {
            $data['success'] = 0;

            return response() -> json($data);
        }
    }

    public function postSearch(Request $req)
    {
        $name = $req->get('name');

        $user = User::where('fname', 'like', '%'.$name.'%') -> orwhere('lname', 'like', '%'.$name.'%') -> get() -> toArray();
        $com = Company::where('name', 'like', '%'.$name.'%') -> get() -> toArray();
        $data = array();

        foreach ($user as $item)
        {
            array_push($data, $item);
        }
        foreach ($com as $item)
        {
            array_push($data, $item);
        }
        if(count($data) != 0)
        {
            $res = array();
            $res['data'] = $data;
            $res['success'] = 1;

        }
        else
        {
            $res = array();
            $res['data'] = array();
            $res['success'] = 0;
        }

        return response() -> json($res);

    }

    public function getUserProfile($email)
    {
        $user = User::where('email', $email) -> get() -> first();
        $com = Company::where('email', $email) -> get() -> first();

        $result_user = array();
        $result_user['results'] = $user;

        $result_com = array();
        $result_com['results'] = $com;

        if (empty($user))
        {
            return response() -> json($result_com);
        }
        else
        {
            return response() -> json($result_user);
        }
    }
}
