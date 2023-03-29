<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $email;
    protected $password;
    public function login()
    {
        return view("pages.auth.login");
    }
    public function auth(Request $request)
    {
        $this->email = $request->get("email");
        $this->password = $request->get("password");
        $user = User::where('email', $this->email)->first();
        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                Session::push('logged-in', $user);
                return redirect()->route('profile');
            } else {
                return Redirect::back()->withErrors(['message' => 'Email or Password wrong']);
            }
        } else {
            return Redirect::back()->withErrors(['message' => 'Email or Password wrong']);
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
