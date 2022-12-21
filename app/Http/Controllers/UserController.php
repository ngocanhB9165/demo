<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use App\Models\User;
Use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view('register.register');
    }
    public function login()
    {
        return view('register.login');
    }
    public function postRegister(RegisterRequest $req)
    {
        $req->validated();
        $req->password = Hash::make($req->password);
        $req->merge(['password'=>$req->password]);
        User::create($req->all());
        return redirect()->route('user.login')->with('success','Đăng ký thành công');
    }
    public function postLogin(LoginRequest $req)
    {
        $req->validated();
        try {
            Auth::attempt(['email' => $req->email, 'password' => $req->password]);
            return redirect()->route('admin.index')->with('success','Đăng Nhập Thành Công');
        } catch (\Throwable $th) {
            dd('loi');
        }
       
    }
}
