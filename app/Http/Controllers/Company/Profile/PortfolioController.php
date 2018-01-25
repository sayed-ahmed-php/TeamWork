<?php

namespace App\Http\Controllers\Company\Profile;

use App\Models\CompanyPortfolio;
use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;

class PortfolioController extends Controller
{
    //
    public function postPortfolio(Request $req)
    {
        $user = Auth::guard('company') -> user();

        Input::file('image') -> move('companies/'.$user['id'].'/portfolio/',Input::file('image') -> getClientOriginalName());
        $path = 'companies/'.$user['id'].'/portfolio/'.Input::file('image') -> getClientOriginalName();

        $data = new CompanyPortfolio([
            'title' => $req -> input('title'),
            'image' => $path,
            'description' => $req -> input('description'),
            'category' => $req -> input('category'),
            'url' => $req -> input('url'),
        ]);

        Auth::guard('company') -> user() -> portfolio() -> save($data);

        return redirect('company/profile');
    }

    public function getPortfolio(Request $req)
    {
        $portfolio = CompanyPortfolio::find($req -> input('id'));
        $cat = MainCategory::all() -> jsonSerialize();

        return view('company.profile.viewPortfolio', compact('portfolio', 'cat')) -> render();
    }

    public function postUpdatePortfolio(Request $req, $id)
    {
        $user = Auth::guard('company') -> user();

        if (empty(input::file('image')))
        {
            DB::table('company_portfolios')
                ->where([
                    'company_id' => $user['id'],
                    'id' => $id,
                ]) -> update([
                    'title' => $req -> input('title'),
                    'category' => $req -> input('category'),
                    'description' => $req -> input('description'),
                    'url' => $req -> input('url'),
                ]);

            return redirect('company/profile');
        }
        else
        {
            $this->validate($req ,[
                'image' => 'image | max:1000',
            ]);

            DB::table('company_portfolios')
                ->where([
                    'company_id' => $user['id'],
                    'id' => $id,
                ]) -> delete();

            Input::file('image') -> move('companies/'.$user['id'].'/portfolio/',Input::file('image') -> getClientOriginalName());
            $path = 'companies/'.$user['id'].'/portfolio/'.Input::file('image') -> getClientOriginalName();

            $data = new CompanyPortfolio([
                'title' => $req -> input('title'),
                'image' => $path,
                'description' => $req -> input('description'),
                'category' => $req -> input('category'),
                'url' => $req -> input('url'),
            ]);

            Auth::guard('company') -> user() -> portfolio() -> save($data);

            return redirect('company/profile');
        }
    }

    public function getDeletePortfolio($id)
    {
        $user = Auth::guard('company') -> user() -> jsonSerialize();

        $portfolio = CompanyPortfolio::where([
                'company_id' => $user['id'],
                'id' => $id,
            ]) -> first() -> jsonSerialize();

        @unlink($portfolio['image']);

        DB::table('company_portfolios')
            ->where([
                'company_id' => $user['id'],
                'id' => $id,
            ]) -> delete();

        return redirect('company/profile');
    }
}
