<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $password;
    protected $role;
    protected $confirm_password;

    function list(Request $request) {
        $search = $request->get('search');
        $data['user'] = User::where('first_name', 'LIKE', '%' . $search . '%')
            ->orWhere('last_name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->get();
        $data['search'] = $search;
        return view("pages.user.list", $data);
    }
    public function insert()
    {
        return view("pages.user.insert");
    }
    public function store(Request $request)
    {
        $this->first_name = $request->get("first_name");
        $this->last_name = $request->get("last_name");
        $this->email = $request->get("email");
        $this->role = $request->get("role");
        $this->password = $request->get("password");
        $this->confirm_password = $request->get("confirm_password");
        if ($this->password != $this->confirm_password) {
            return Redirect::back()->withErrors(['message' => 'Password not match']);
        } else {
            $payload = [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'role' => $this->role,
                'password' => Hash::make($this->password),
            ];
            $inserted = User::create($payload);
            if ($inserted) {
                return redirect()->route('user.list');
            } else {
                return Redirect::back()->withErrors(['message' => 'Something wrong, please contact developers']);
            }
        }
    }
    public function edit($id)
    {
        $data['user'] = User::find($id);
        $data['id'] = $id;
        return view("pages.user.edit", $data);
    }
    public function update(Request $request, $id)
    {
        $this->first_name = $request->get("first_name");
        $this->last_name = $request->get("last_name");
        $this->email = $request->get("email");
        $this->role = $request->get("role");
        $this->password = $request->get("password");
        $this->confirm_password = $request->get("confirm_password");
        $payload = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'role' => $this->role,
        ];
        if ($this->password || $this->confirm_password) {
            if ($this->password === $this->confirm_password) {
                $payload['password'] = Hash::make($this->password);
            } else {
                return Redirect::back()->withErrors(['message' => 'Password not match']);
            }
        }
        $inserted = User::find($id)->update($payload);
        if ($inserted) {
            return redirect()->route('user.list');
        } else {
            return Redirect::back()->withErrors(['message' => 'Something wrong, please contact developers']);
        }
    }
    public function destroy($id)
    {
        $deleted = User::destroy($id);
        if ($deleted) {
            return redirect()->route('user.list');
        } else {
            echo "<script>alert('Something wrong, please contact developers')</script>";
            return redirect()->route('user.list');
        }
    }
}
