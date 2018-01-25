<?php

namespace App\Http\Controllers\Company\Profile;

use App\Models\CompanyPortfolio;
use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    public function index()
    {
        $com = Auth::guard('company') -> user();

        $cat = MainCategory::all() -> jsonSerialize();
        $portfolio = CompanyPortfolio::where('company_id',$com['id']) -> get() -> jsonSerialize();

        return view('company.profile.profile', compact('com', 'portfolio', 'cat'));
    }

    public function postImage(Request $req)
    {
        $com = Auth::guard('company') -> user();

        if (!empty($com['image']))
        {
            @unlink($com['image']);
        }

        Input::file('image') -> move('companies/'.$com['id'].'/',Input::file('image') -> getClientOriginalName());
        $path = 'companies/'.$com['id'].'/'.Input::file('image') -> getClientOriginalName();

        $com -> image = $path;

        $com -> save();

        return redirect('company/profile');
    }

    public  function postName(Request $req)
    {
        $user = Auth::guard('company') -> user();

        $user -> name = $req -> input('name');

        $user -> save();

        return redirect('/company/profile');
    }

    public function getSave(Request $req)
    {
        $com = Auth::guard('company') -> user();

        $com -> overview = $req -> input('text');

        $com -> update();
    }
}
