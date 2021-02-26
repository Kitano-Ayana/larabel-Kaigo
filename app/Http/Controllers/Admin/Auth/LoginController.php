<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('admin');
    }

    // ログイン画面
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return $this->loggedOut($request);
    }

    // ログアウトした時のリダイレクト先
    public function loggedOut(Request $request)
    {
        return redirect(route('admin.login'));
    }
}
