<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\MainSkill;
use App\Models\Team;
use App\Models\UserContact;
use App\Models\UserTeam;
use Illuminate\Http\Request;
use Auth;
use File;
use App\Models\User;

class UserSettingController extends Controller
{
    public function index()
    {
        return view('user.setting.home');
    }

    public function getPassword()
    {
        return view('user.setting.changePassword');
    }

    public function getPass(Request $req)
    {
        if (Auth::guard('web') -> attempt(['password' => $req -> input('pass')]))
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
        if (Auth::guard('web') -> attempt(['password' => $req -> input('old')]))
        {
            if ($req -> input('old') != $req -> input('password'))
            {
                $user = Auth::guard('web') -> user();
                $user -> password = bcrypt($req -> input('password'));
                $user -> save();

                Auth::guard('web') -> logout();
                return redirect('login');
            } else
            {
                return Redirect('/user/setting');
            }
        } else
        {
            return Redirect('/user/setting');
        }
    }

    public function getProfileSetting()
    {
        $user = Auth::guard('web') -> user() -> jsonSerialize();
        $cat = MainCategory::all() -> jsonSerialize();
        $skill = MainSkill::all() -> jsonSerialize();

        return view('user.setting.profileSetting', compact('user', 'cat', 'skill'));
    }

    public function getPhone(Request $req)
    {
        $user = Auth::guard('web') -> user();

        $user -> phone = $req -> input('phone');

        $user -> update();
    }

    public function postProfileSetting(Request $req)
    {
        $user = Auth::guard('web') -> user();
        $user -> show = $req -> input('show');
        $user -> state = $req -> input('state');

        $user -> update();
    }

    public function getCategory(Request $req)
    {
        $user = Auth::guard('web') -> user();
        $user -> field = $req -> input('category');
        $user -> skill = $req -> input('skill');

        $user -> update();

        return $req -> input('category') . ' - ' . $req -> input('skill');
    }

    public function getDelete()
    {
        $user = User::find(Auth::guard('web') -> user()->id);

        if (File::cleanDirectory('users/'.$user['id']))
        {
            rmdir('users/'.$user['id']);
        }

        Auth::guard('web') -> logout();

        if ($user->forceDelete()) {

            return Redirect('login')->with('fail', 'Your account has been deleted!');
        }
    }

    public function getTeam()
    {
        $leader = Team::where('leader', Auth::guard('web') -> user() -> id) -> get();
        $member = Auth::guard('web') -> user() -> team() -> get();
        $contact = Auth::guard('web') -> user() -> contact() -> get();
        $contact1 = UserContact::where('contact_id', Auth::guard('web') -> user() -> id) -> get();

        return view('user.setting.team', compact('leader', 'member', 'contact', 'contact1'));
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
