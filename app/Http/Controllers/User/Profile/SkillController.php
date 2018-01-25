<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use Auth;
use DB;

class SkillController extends Controller
{
    public function postSkill(Request $req)
    {
        $data = new UserSkill([
            'skill' => $req -> input('skill'),
            'overview' => $req -> input('overview'),
        ]);

        Auth::guard('web') -> user() -> skill() -> save($data);

        return redirect('/user/profile');
    }

    public function getSkill(Request $req)
    {
        $skill = UserSkill::find($req -> input('id'));

        return view('user.profile.skill.viewSkill', compact('skill')) -> render();
    }

    public function postUpdateSkill(Request $req, $id)
    {
        $user = Auth::guard('web') -> user();

        DB::table('user_skills')
            ->where([
                'user_id' => $user['id'],
                'id' => $id,
            ]) -> update([
                'skill' => $req -> input('skill'),
                'overview' => $req -> input('overview'),
            ]);

        return redirect('/user/profile');
    }

    public function getDeleteSkill($id)
    {
        $user = Auth::guard('web') -> user();

        DB::table('user_skills')
            ->where([
                'user_id' => $user['id'],
                'id' => $id,
            ]) -> delete();

        return redirect('/user/profile');
    }
}
