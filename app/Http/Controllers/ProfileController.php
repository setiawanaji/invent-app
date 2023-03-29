<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $password;
    protected $confirm_password;
    public function index()
    {
        $id = Session::get("logged-in")[0]->id;
        $profile = User::where("id", $id)->first();
        $data['profile'] = $profile;
        return view("pages.profile.index", $data);
    }
    public function edit()
    {
        $id = Session::get("logged-in")[0]->id;
        $profile = User::where("id", $id)->first();
        $data['profile'] = $profile;
        return view("pages.profile.edit", $data);
    }
    public function update(Request $request)
    {
        $this->first_name = $request->get("first_name");
        $this->last_name = $request->get("last_name");
        $this->email = $request->get("email");
        $this->password = $request->get("password");
        $this->confirm_password = $request->get("confirm_password");
        $payload['first_name'] = $this->first_name;
        $payload['last_name'] = $this->last_name;
        if ($this->password || $this->confirm_password) {
            if ($this->password === $this->confirm_password) {
                $payload['password'] = Hash::make($this->password);
            } else {
                return Redirect::back()->withErrors(['message' => 'Password not match']);
            }
        }
        $updated = User::where('email', $this->email)->update($payload);
        if ($updated) {
            Session::flush();
            return redirect()->route('login');
        } else {
            return Redirect::back()->withErrors(['message' => 'Something wrong, please contact developers']);
        }
    }
}
