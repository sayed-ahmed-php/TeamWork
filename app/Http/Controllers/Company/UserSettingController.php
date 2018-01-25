<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\MainSkill;
use App\Models\UserTeam;
use Illuminate\Http\Request;
use Auth;
use File;
use App\Models\Company;
use Illuminate\Support\Facades\Input;

class UserSettingController extends Controller
{
    public function index()
    {
        return view('company.setting.home');
    }

    public function getPassword()
    {
        return view('company.setting.changePassword');
    }

    public function getPass(Request $req)
    {
        if (Auth::guard('company') -> attempt(['password' => $req -> input('pass')]))
        {
            return 'true';
        }
        else
        {
            return 'false';
        }
    }

    public function postPassword(Request $req)
    {
        if (Auth::guard('company') -> attempt(['password' => $req -> input('old')]))
        {
            if ($req -> input('old') != $req -> input('password'))
            {
                $com = Auth::guard('company') -> user();
                $com -> password = bcrypt($req -> input('password'));
                $com -> save();

                Auth::guard('company') -> logout();
                return redirect('login');
            } else
            {
                return Redirect('/company/setting');
            }
        } else
        {
            return Redirect('/company/setting');
        }
    }

    public function getProfileSetting()
    {
        $com = Auth::guard('company') -> user() -> jsonSerialize();
        $cat = MainCategory::all() -> jsonSerialize();

        return view('company.setting.profileSetting', compact('com', 'cat'));
    }

    public function getPhone(Request $req)
    {
        $com = Auth::guard('company') -> user();

        $com -> phone = $req -> input('phone');

        $com -> update();
    }

    public function postProfileSetting( Request $req)
    {
        $com = Auth::guard('company') -> user();
        $com -> show = $req -> input('show');

        $com -> upate();
    }

    public function getCategory(Request $req)
    {
        $com = Auth::guard('company') -> user();
        $com -> field = $req -> input('category');

        $com -> update();

        return $req -> input('category');
    }

    public function getDelete()
    {
        $com = Company::find(Auth::guard('company') -> user()->id);

        Auth::guard('company') -> logout();

        if (File::cleanDirectory('companies/'.$com['id']))
        {
            rmdir('companies/'.$com['id']);
        }

        if ($com->forceDelete()) {

            return Redirect('login')->with('fail', 'Your account has been deleted!');
        }
    }

    public function getTeam()
    {
        $leader = Team::where('leader', Auth::guard('company') -> user() -> id) -> get();
        $contact = Auth::guard('web') -> user() -> contact() -> get();

        return view('company.setting.team', compact('leader', 'contact'));
    }

    public function postAddTeam(Request $req)
    {
        $team = Team::all();
        $msg = 'true';

        if (!empty($team))
        {
            foreach ($team as $team)
            {
                if ($team['name'] == $req -> input('name'))
                {
                    $msg = 'false';
                }
            }
        }

        if ($msg == 'true')
        {
            $team = new Team([
                'name' => $req -> input('name'),
                'leader' => Auth::guard('web') -> user() -> id
            ]);

            $team -> save();

            return 'true';
        }
    }

    public function getCheck(Request $req)
    {
        $team = Team::all();
        $msg = 'true';

        if (!empty($team))
        {
            foreach ($team as $team)
            {
                if ($team['name'] == $req -> input('name'))
                {
                    $msg = 'false';
                }
            }
        }

        return $msg;
    }

    public function getAddMember(Request $req)
    {
        $data = Team::where('name', $req -> input('name')) -> first();

        $team = new UserTeam([
            'team_id' => $data['id'],
            'user_id' => $req -> input('id')
        ]);

        $team -> save();
    }
}