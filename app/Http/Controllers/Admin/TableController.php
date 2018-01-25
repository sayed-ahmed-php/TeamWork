<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Company;
use App\Models\CompanyPortfolio;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\UserCertification;
use App\Models\UserEducation;
use App\Models\UserPortfolio;
use App\Models\UserSkill;
use App\Models\UserTest;
use Illuminate\Http\Request;

class TableController extends Controller
{
    //
    public function getUser()
    {
        $user = User::all();

        return view('admin.table.user.user', compact('user'));
    }

    public function getDeleteUser($id)
    {
        User::find($id) -> delete();

        return redirect('dashboard\view-users');
    }

    public function getPort(Request $req)
    {
        $port = UserPortfolio::where('user_id', $req -> input('id'));

        return view('admin.table.user.port', compact('port')) -> render();
    }

    public function getCert(Request $req)
    {
        $cert = UserCertification::where('user_id', $req -> input('id'));

        return view('admin.table.user.cert', compact('cert')) -> render();
    }

    public function getEdu(Request $req)
    {
        $edu = UserEducation::where('user_id', $req -> input('id'));

        return view('admin.table.user.edu', compact('edu')) -> render();
    }

    public function getSkill(Request $req)
    {
        $skill = UserSkill::where('user_id', $req -> input('id'));

        return view('admin.table.user.skill', compact('skill')) -> render();
    }

    public function getTest(Request $req)
    {
        $test = UserTest::where('user_id', $req -> input('id'));

        return view('admin.table.user.test', compact('test')) -> render();
    }

    public function getDeleteUserPort($id)
    {
        UserPortfolio::find($id) -> delete();

        return redirect('dashboard\view-users');
    }

    public function getDeleteUserCert($id)
    {
        UserCertification::find($id) -> delete();

        return redirect('dashboard\view-users');
    }

    public function getDeleteUserEdu($id)
    {
        UserEducation::find($id) -> delete();

        return redirect('dashboard\view-users');
    }

    public function getDeleteUserSkill($id)
    {
        UserSkill::find($id) -> delete();

        return redirect('dashboard\view-users');
    }

    public function getDeleteUserTest($id)
    {
        UserTest::find($id) -> delete();

        return redirect('dashboard\view-users');
    }

    public function getCompany()
    {
        $com = Company::all();

        return view('admin.table..company.company', compact('com'));
    }

    public function getComPort(Request $req)
    {
        $port = CompanyPortfolio::where('com_id', $req -> input('id'));

        return view('admin.table.company.port', compact('port')) -> render();
    }

    public function getDeleteCompany($id)
    {
        Company::find($id) -> delete();

        return redirect('dashboard\view-companies');
    }

    public function getDeleteCompanyPort($id)
    {
        CompanyPortfolio::find($id) -> delete();

        return redirect('dashboard\view-companies');
    }

    public function getPost()
    {
        $post = Post::all();

        return view('admin.table.post.post', compact('post'));
    }

    public function getComment(Request $req)
    {
        $comment = Comment::where('post_id', $req -> input('id'));

        return view('admin.table.post.comment', compact('comment')) -> render();
    }

    public function getDeletePost($id)
    {
        Post::find($id) -> delete();

        return redirect('dashboard\view-posts');
    }

    public function getDeleteComment($id)
    {
        Comment::find($id) -> delete();

        return redirect('dashboard\view-posts');
    }
}
