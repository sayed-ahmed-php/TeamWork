<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyContact;
use App\Models\MainCategory;
use App\Models\MainSkill;
use App\Models\User;
use App\Models\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $cat = MainCategory::all() -> jsonSerialize();
        $skill = MainSkill::all() -> jsonSerialize();
        return view('content.home', compact('cat', 'skill'));
    }

    public function getTopSkill($skill)
    {
        $user = User::where('skill',strtolower($skill))-> get() -> jsonSerialize();
        $data = MainSkill::all() -> where('name' , $skill) -> first() -> jsonSerialize();

        return view('content.top10', compact('user', 'data'));
    }

    public function getSearch(Request $req)
    {
        $cat = MainCategory::all() -> jsonSerialize();

        $name = $req -> input('search');
        $user = User::where('show', 'active') -> where('fname', 'like', '%'.$name.'%') -> orwhere('lname', 'like', '%'.$name.'%') -> get() -> jsonSerialize();
        $com = Company::where('show', 'active') -> where('name', 'like', '%'.$name.'%') -> get() -> jsonSerialize();
        return view('content.search', compact('user', 'name', 'com', 'cat'));
    }

    public function getSSearch(Request $req)
    {
        $name = $req -> input('search');
        $cat = MainCategory::all() -> jsonSerialize();
        $user = User::where('show', 'active') -> where('skill', $req -> input('skill')) -> where('field', $req -> input('category')) ->
                 where('fname', 'like', '%'.$name.'%') -> orwhere('lname', 'like', '%'.$name.'%') -> get() -> jsonSerialize();
        $com = '';

        return view('content.search', compact('user', 'name', 'com', 'cat'));
    }

    public function getUserView($id)
    {
        $user = User::find($id);
        $t = 'f';
        $t1 = 'f';

        $portfolio = $user -> portfolio() -> get() -> jsonSerialize();
        $education = $user -> education() -> get() -> jsonSerialize();
        $certification = $user -> certification() -> get() -> jsonSerialize();
        $test = $user -> test() -> get() -> jsonSerialize();
        $skill = $user -> skill() -> get() -> jsonSerialize();

        if (Auth::guard('web') -> check())
        {
            $contact = Auth::guard('web') -> user() -> contact() -> get();
            if (!empty($contact))
            {
                foreach ($contact as $contact)
                {
                    if ($contact['contact_id'] == $user['id']) $t = 't';
                }
            }

            $contact = UserContact::where('contact_id', Auth::guard('web') -> user() -> id) -> get();
            if (!empty($contact))
            {
                foreach ($contact as $contact)
                {
                    if ($contact['contact_id'] == Auth::guard('web') -> user() -> id)
                        $t1 = 't';
                }
            }
        }
        elseif (Auth::guard('company') -> check())
        {
            $contact = Auth::guard('company') -> user() -> contact() -> get();
            if (!empty($contact))
            {
                foreach ($contact as $contact)
                {
                    if ($contact['contact_id'] == $user['id']) $t = 't';
                }
            }

            $contact = CompanyContact::where('contact_id', Auth::guard('company') -> user() -> id) -> get();
            if (!empty($contact))
            {
                foreach ($contact as $contact)
                {
                    if ($contact['contact_id'] == Auth::guard('company') -> user() -> id)
                        $t1 = 't';
                }
            }
        }

        return view('user.view.userView', compact('user', 'portfolio', 'education', 'certification', 'test', 'skill', 't', 't1'));
    }

    public function getCompanyView($id)
    {
        $com = Company::find($id);

        $portfolio = $com -> portfolio() -> get() -> jsonSerialize();

        return view('company.view.companyView', compact('com', 'portfolio'));
    }

    public function getSkill(Request $req)
    {
        $skill = MainCategory::where('name', $req -> input('cat')) -> first();
        $skill = MainSkill::where('cat_id', $skill['id']) -> get();
        $class = $req -> input('class');
        $id = $req -> input('id');

        return view('content.skill', compact('skill', 'class', 'id')) -> render();
    }

    public function getAdd(Request $req)
    {
        $id = $req -> input('id');

        if (Auth::guard('web') -> check())
        {
            $contact = new UserContact([
                'contact_id' => $id
            ]);

            Auth::guard('web') -> user() -> contact() -> save($contact);
        }
        elseif (Auth::guard('company') -> check())
        {
            $contact = new CompanyContact([
                'contact_id' => $id
            ]);

            Auth::guard('company') -> user() -> contact() -> save($contact);
        }
    }
}
