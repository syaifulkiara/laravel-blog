<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
/*
|--------------------------------------------------------------------------
| Login Controller
|--------------------------------------------------------------------------
|
| This controller handles authenticating users for the application and
| redirecting them to your home screen. The controller uses a trait
| to conveniently provide its functionality to your applications.
|
*/

use AuthenticatesUsers;

/**
* Where to redirect users after login.
*
* @var string
*/
protected $redirectTo = RouteServiceProvider::HOME;

/**
* Create a new controller instance.
*
* @return void
*/
public function __construct()
{
    $this->middleware('guest')->except('logout');
    $this->redirectTo = url()->previous();
}

public function showLoginForm()
{
    if(!session()->has('url.intended'))
    {
        session(['url.intended' => url()->previous()]);
    }
    return view('auth.login');
}

public function login(Request $request)
{
    $this->validate($request, [
        'name'      => 'required|string',
        'password'  => 'required|string|min:8',
    ]);

    $loginType = filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
    $login = [
        $loginType => $request->name,
        'password' => $request->password
    ];
    if (auth()->attempt($login)) {
        return redirect()->route('home');
        }else{
        return redirect()->route('login')
        ->with('error','Email-Address And Password Are Wrong.');
    }
  }
}

