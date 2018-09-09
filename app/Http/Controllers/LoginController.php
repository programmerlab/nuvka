<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\User;
use Auth;
use Input;

class LoginController extends Controller
{
    public function userLogin()
    {
        $input = Input::all();
        //echo "<pre>"; print_r($input); die;
        if (count($input) > 0) {
            $auth = auth()->guard('user');

            $credentials = [
                'email'    => $input['email'],
                'password' => $input['password'],
            ];

            if ($auth->attempt($credentials)) {
                return redirect()->action('LoginController@profile');
            } else {
                echo 'Error';
            }
        } else {
            return view('user.login');
        }
    }

    public function adminLogin()
    {
        $input = Input::all();
        //echo "<pre>"; print_r($input); die;
        if (count($input) > 0) {
            $auth = auth()->guard('admin');
            //echo "<pre>"; print_r($input); die;
            $credentials = [
                'email'    => $input['email'],
                'password' => $input['password'],
            ];

            if ($auth->attempt($credentials)) {
                return redirect()->action('LoginController@profile');
            } else {
                echo 'Error';
            }
        } else {
            return view('admin.login');
        }
    }

    public function profile()
    {
        if (auth()->guard('admin')->check()) {
            pr(auth()->guard('admin')->user()->toArray());
        }

        if (auth()->guard('user')->check()) {
            pr(auth()->guard('user')->user()->toArray());
        }
    }

    public function signup(Request $request)
    {
        dd($request->all());

        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
