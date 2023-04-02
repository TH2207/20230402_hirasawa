<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->get();
        if (count($user) === 0) {
            return view('login', ['login_error' => '1']);
        }

        if (Hash::check($request->password, $user[0]->password)) {
            session()->flush();
            session(['id' => $user[0]->id]);
            session(['name'  => $user[0]->name]);
            return redirect()->route('reserve.show');
        } else {
            return view('login', ['login_error' => '1']);
        }
    }

    public function destroy()
    {
        session()->flush();
        return redirect()->route('login.create');
    }
}
