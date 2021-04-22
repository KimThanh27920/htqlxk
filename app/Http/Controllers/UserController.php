<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;
use App\Models\User;
use Session;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function postLogin(Request $request){
      
    //     if($request->username == '' || $request->password == ''){
    //         return redirect('/login')->with('notice', 'Tài khoản hoặc Mật khẩu trống!');
    //     }

    //     if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/home');
    //     }else {
    //         return redirect('/login')->with('notice', 'Tài khoản hoặc Mật khẩu sai!');
    //     }

    // }
    
    public function getLogout(){
        if (Auth::check()){
            Auth::logout();
            return redirect('/login');
        }else{
            echo 'fail';
        }
    }

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    
    //     $request->session()->invalidate();
    
    //     $request->session()->regenerateToken();

    //     // $request->session()->delete();
    
    //     return redirect('/login')->with('notice', 'Đăng Xuất Thành Công');
    // }
}
