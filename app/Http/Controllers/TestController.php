<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Java;
use App\Models\Php;
use App\Models\HtmlCss;
use App\Models\User;
use App\Models\UserTest;
use Auth;

class TestController extends Controller
{
    //
    public function getIndex()
    {
        $test = Test::all();
        return view('test.allTests', compact('test'));
    }

    public function getType($id)
    {
        $test = Test::find($id);

        return view('test.testInfo', compact('test'));
    }

    public function getTest($name, $id)
    {
        $test = HtmlCss::all();

        if (!(Auth::guard('web') -> check()))
        {
            $user = User::find($id) -> first();

            $try = new UserTest([
                'name' => $name,
                'grade' => 0,
                'time' => '0'
            ]);
            $user -> test() -> save($try);
        }

        return view('test.questions',compact('name', 'test', 'id'));
    }

    public function getResult($name, $result, $id)
    {
        $user = User::find($id) -> first();
        $test = $user -> test() -> get();
        $t = 'true';
        $id = 0;

        if (!empty($test))
        {
            foreach ($test as $test)
            {
                if ($test['name'] == $name)
                {
                    $t = 'false';
                    $id = $test['id'];
                }
            }
        }

        if ($t == 'false')
        {
            $test = UserTest::find($id) -> first();
                $test -> name = $name;
                $test -> degree = $result;
                $test -> time = '30';
            $user -> test() -> save($test);
        }
        else
        {
            $test = new UserTest([
                'name' => $name,
                'grade' => $result,
                'time' => '30'
            ]);
            $user -> test() -> save($test);
        }

        return view('test.result',compact('name', 'result')) -> render();
    }
}
