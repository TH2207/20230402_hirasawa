<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        session()->put('email', $request->email);
        session()->put('password', $request->password);
        return redirect()->route('register.thanks');
    }

    public function thanks()
    {
        $email = session()->get('email');
        $password = session()->get('password');

        $params = [
            'email' => $email,
            'password' => $password,
        ];
        return view('thanks', $params);
    }
}
