<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate(
                [
                    'email' => 'required|email',
                    'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).+$/'
                ],
                [
                    'email.required' => "Chưa nhập email",
                    'email.email' => "Email không đúng định dạng",
                    'password.required' => "Chưa nhập mật khẩu",
                    'password.regex' => "Mật khẩu phải có ít nhất 1 chữ viết hoa, chữ thường, số và ký tự đặc biệt"
                ]
            );
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = DB::table('users')->where('email', $request->email)->first();
                if ($user->role == 0) {
                    return redirect()->route('movie');
                } else {
                    return redirect()->route('admin');
                }
            } else {
                Session::flash('error', 'Thông tin tài khoản hoặc mật khẩu không chính xác');
                return redirect()->route('login');
            }
        }
        return view("auth.login");
    }

    public function register(AuthRequest $request)
    {
        if ($request->method('POST')) {
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $params = $request->except('_token', 'image');
                $params['password'] = Hash::make($request->password);
                $params['avatar'] = $request->file('avatar')->store('images', 'public');
                $user = User::create($params);
                if ($user->id) {
                    Session::flash('success', 'Đăng ký thành công');
                    return redirect()->route('login');
                }
            }
        }
        return view("auth.register");
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route("movie");
    }

    public function profile(Request $request)
    {

        return view('auth.profile');
    }
    public function update_Profile(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate(
                [
                    'username' => 'required',
                    'fullname' => 'required',
                    'email' => [
                        'required',
                        'email',

                        Rule::unique('users')->ignore(Auth::user()->id)
                    ],
                ],
                [
                    'username.required' => "Tên không được để trống",
                    'fullname.required' => "Tên không được để trống",
                    'email.required' => "Email không được để trống",
                    'email.email' => "Email không đúng định dạng",
                    'email.unique' => "Email đã được đăng ký",
                ]
            );
            $params = $request->except('_token');
            $user_UD = DB::table("users")->where("id", "=", Auth::user()->id)->update([
                "fullname" => $params['fullname'],
                "username"=>$params['username'],
                "email" => $params['email'],

            ]);
            if ($user_UD) {
                Session::flash("success_profile", "Cập nhật thông tin thành công");
                return redirect()->route("profile");
            } else {
                Session::flash("success_profile", "Cập nhật thông tin thành công");
                return redirect()->route("profile");
            }
        }
    }
}
