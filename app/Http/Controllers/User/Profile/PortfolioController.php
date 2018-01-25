<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\UserPortfolio;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;

class PortfolioController extends Controller
{
    //
    public function postPortfolio(Request $req)
    {
        $user = Auth::guard('web') -> user();

        Input::file('image') -> move('users/'.$user['id'].'/portfolio/',Input::file('image') -> getClientOriginalName());
        $path = 'users/'.$user['id'].'/portfolio/'.Input::file('image') -> getClientOriginalName();

        $data = new UserPortfolio([
            'title' => $req -> input('title'),
            'image' => $path,
            'description' => $req -> input('description'),
            'category' => $req -> input('category'),
            'url' => $req -> input('url'),
        ]);

        Auth::guard('web') -> user() -> portfolio() -> save($data);

        return redirect('/user/profile');
    }

    public function getPortfolio(Request $req)
    {
        $portfolio = UserPortfolio::find($req -> input('id'));
        $cat = MainCategory::all() -> jsonSerialize();

        return view('user.profile.portfolio.viewPortfolio', compact('portfolio', 'cat')) -> render();
    }

    public function postUpdatePortfolio(Request $req, $id)
    {
        $user = Auth::guard('web') -> user();

        if (empty(input::file('image')))
        {
            DB::table('user_portfolios')
                ->where([
                    'user_id' => $user['id'],
                    'id' => $id,
                ]) -> update([
                    'title' => $req -> input('title'),
                    'category' => $req -> input('category'),
                    'description' => $req -> input('description'),
                    'url' => $req -> input('url'),
                ]);

            return redirect('/user/profile');
        }
        else
        {
            $this->validate($req ,[
                'image' => 'image | max:1000',
            ]);

            DB::table('user_portfolios')
                ->where([
                    'user_id' => $user['id'],
                    'id' => $id,
                ]) -> delete();

            Input::file('image') -> move('users/'.$user['id'].'/portfolio/',Input::file('image') -> getClientOriginalName());
            $path = 'users/'.$user['id'].'/portfolio/'.Input::file('image') -> getClientOriginalName();

            $data = new UserPortfolio([
                'title' => $req -> input('title'),
                'image' => $path,
                'description' => $req -> input('description'),
                'category' => $req -> input('category'),
                'url' => $req -> input('url'),
            ]);

            Auth::guard('web') -> user() -> portfolio() -> save($data);

            return redirect('/user/profile');
        }
    }

    public function getDeletePortfolio($id)
    {
        $user = Auth::guard('web') -> user() -> jsonSerialize();
        $portfolio = UserPortfolio::where([
                'user_id' => $user['id'],
                'id' => $id,
            ]) -> first() -> jsonSerialize();

        @unlink($portfolio['image']);

        DB::table('user_portfolios')
            ->where([
                'user_id' => $user['id'],
                'id' => $id,
            ]) -> delete();

        return redirect('/user/profile');
    }
}
