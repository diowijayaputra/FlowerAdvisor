<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FAuser;

class faController extends Controller
{
    public function registerUser(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data['password'] = md5($data['password']);

        FAuser::create($data);

        return redirect('/')->with('success', 'Data inserted successfully!');
    }

    public function sessionDestroy(Request $request)
    {
        session()->forget('email');
    }

    public function getData(Request $request, $fullname, $email)
    {
        $users1 = FAuser::where('fullname', $fullname)->get();
        $fullname = response()->json($users1)->getData();

        $users2 = FAuser::where('email', $email)->get();
        $userEmail = response()->json($users2)->getData();

        if (count($fullname) > 0) {
            if (count($userEmail) > 0) {
                return 3;
            } else {
                return 1;
            }
        } else {
            if (count($userEmail) > 0) {
                return 2;
            } else {
                return 0;
            }
        }
    }

    public function login(Request $request, $email, $password)
    {
        $users = FAuser::where('email', $email)->get();
        $userData = response()->json($users)->getData();

        if (count($userData) > 0) {
            foreach ($users as $user) {
                $emailVal = $user->email;
                $passVal = $user->password;

                if (md5($password) != $passVal) {
                    return 1;
                } else {
                    session()->put('email', $emailVal);
                    return session('email');
                }
            }
        } else {
            return 0;
        }
    }

    public function getEmail(Request $request)
    {
        $email = session('email');
        return $email;
    }
}
