<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{

    public function getLogin()
    {
        return view('login');
    }
    public function getSignup()
    {
        return view('signup');
    }
   
    public function store(UserRequest $request)
    {
       if(DB::table('users')->where('email', $request->email)->doesntExist()){
        $newUser = $request->validated();
        $newUser['password'] = bcrypt($request->password);
        User::create($newUser);
        return redirect('/')->with('message', 'Đăng ký thành công xin mời đăng nhập');
       }else{
        return redirect('/dang-ky')->with('message', 'Tài khoản đã tồn tại xin mời đăng nhập');
       }
    }
    public function checkLogin(Request $request)
    {
        $rule = [
            'email' => 'required',
            'password' => 'required'
        ];
        $messages = [
            'required'=> 'Trường bắt buộc phải nhập'
        ];
       $user = $request->validate($rule,$messages);
        $remember = $request->remember;
        if(Auth::attempt(['email'=>$user['email'],'password'=>$user['password']],$remember)){
            if(Auth::user()->role==0){
                return redirect('admin/index')->with('message', 'Đăng nhập thành công');
            
            }else{
                return redirect('/home');
            } 
        }else{
            return redirect('/')->with('message', 'Tài khoản hoặc mật khẩu không chính xác');

        }
    }
    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect('/')->with('message', 'Đăng xuất thành công');
    }
}
