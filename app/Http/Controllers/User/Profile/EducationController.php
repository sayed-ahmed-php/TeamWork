<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\UserEducation;
use Illuminate\Http\Request;
use Auth;
use DB;

class EducationController extends Controller
{
    public function postEducation(Request $req)
    {
        $data = new UserEducation([
            'school' => $req -> input('school'),
            'start' => $req -> input('from'),
            'end' => $req -> input('to'),
            'degree' => $req -> input('degree'),
        ]);

        Auth::guard('web') -> user() -> education() -> save($data);

        return redirect('/user/profile');
    }

    public function getEducation(Request $req)
    {
        $education = UserEducation::find($req -> input('id'));

        return view('user.profile.education.viewEducation', compact('education')) -> render();
    }

    public function postUpdateEducation(Request $req, $id)
    {
        $user = Auth::guard('web') -> user();

        DB::table('user_educations')
            ->where([
                'user_id' => $user['id'],
                'id' => $id,
            ]) -> update([
                'school' => $req -> input('school'),
                'start' => $req -> input('from'),
                'end' => $req -> input('to'),
                'degree' => $req -> input('degree'),
            ]);

        return redirect('/user/profile');
    }

    public function getDeleteEducation($id)
    {
        $user = Auth::guard('web') -> user();

        DB::table('user_educations')
            ->where([
                'user_id' => $user['id'],
                'id' => $id,
            ]) -> delete();

        return redirect('/user/profile');
    }
}
