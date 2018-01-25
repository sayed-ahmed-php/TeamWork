<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\UserCertification;
use App\Models\UserEducation;
use App\Models\UserPortfolio;
use App\Models\UserSkill;
use App\Models\UserTest;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $user = Auth::guard('web') -> user();

        $cat = MainCategory::all();
        $portfolio = UserPortfolio::where('user_id',$user['id']) -> get();
        $certification = UserCertification::where('user_id',$user['id']) -> get();
        $education = UserEducation::where('user_id',$user['id']) -> get();
        $skill = UserSkill::where('user_id',$user['id']) -> get();
        $test = UserTest::where('user_id',$user['id']) -> get();

        return view('user.profile.profile',
            compact('user', 'portfolio', 'certification', 'education', 'skill', 'test', 'cat'));
    }

    public function postImage(Request $req)
    {
        $user = Auth::guard('web') -> user();

        if (!empty($user['image']))
        {
            @unlink($user['image']);
        }

        Input::file('image') -> move('users/'.$user['id'].'/',Input::file('image') -> getClientOriginalName());
        $path = 'users/'.$user['id'].'/'.Input::file('image') -> getClientOriginalName();

        $user -> image = $path;

        $user -> save();

        return redirect('/user/profile');
    }

    public  function postName(Request $req)
    {
        $user = Auth::guard('web') -> user();

        $user -> fname = $req -> input('fname');
        $user -> lname = $req -> input('lname');

        $user -> save();

        return redirect('/user/profile');
    }

    public function getSave(Request $req)
    {
        $user = Auth::guard('web') -> user();

        $user -> overview = $req -> input('text');

        $user -> update();
    }
}
