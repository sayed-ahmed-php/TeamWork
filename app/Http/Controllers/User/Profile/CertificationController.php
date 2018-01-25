<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\UserCertification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CertificationController extends Controller
{
    //
    public function postCertification(Request $req)
    {
        $user = Auth::guard('web') -> user();

        Input::file('image') -> move('users/'.$user['id'].'/certification/',Input::file('image') -> getClientOriginalName());
        $path = 'users/'.$user['id'].'/certification/'.Input::file('image') -> getClientOriginalName();

        $data = new UserCertification([
            'image' => $path,
            'overview' => $req -> input('overview'),
            'category' => $req -> input('category'),
        ]);

        Auth::user() -> certification() -> save($data);

        return redirect('/user/profile');
    }

    public function getCertification(Request $req)
    {
        $certification = UserCertification::find($req -> input('id'));

        return view('user.profile.certification.editCertification', compact('certification')) -> render();
    }

    public function postUpdateCertification(Request $req, $id)
    {
        $user = Auth::guard('web') -> user();

        if (empty(input::file('image')))
        {
            DB::table('user_certifications')
                ->where([
                    'user_id' => $user['id'],
                    'id' => $id,
                ]) -> update([
                    'category' => $req -> input('category'),
                    'overview' => $req -> input('overview'),
                ]);

            return redirect('/user/profile');
        }
        else
        {
            $this->validate($req ,[
                'image' => 'image | max:1000',
            ]);

            DB::table('user_certifications')
                ->where([
                    'user_id' => $user['id'],
                    'id' => $id,
                ]) -> delete();

            Input::file('image') -> move('users/'.$user['id'].'/certification/',Input::file('image') -> getClientOriginalName());
            $path = 'users/'.$user['id'].'/certification/'.Input::file('image') -> getClientOriginalName();

            $data = new UserCertification([
                'image' => $path,
                'overview' => $req -> input('overview'),
                'category' => $req -> input('category'),
            ]);

            Auth::guard('web') -> user() -> certification() -> save($data);

            return redirect('/user/profile');
        }
    }

    public function getDeleteCertification($id)
    {
        $user = Auth::guard('web') -> user() -> jsonSerialize();
        $certification = UserCertification::where([
            'user_id' => $user['id'],
            'id' => $id,
        ]) -> first() -> jsonSerialize();

        @unlink($certification['image']);

        DB::table('user_certifications')
            ->where([
                'user_id' => $user['id'],
                'id' => $id,
            ]) -> delete();

        return redirect('/user/profile');
    }
}
