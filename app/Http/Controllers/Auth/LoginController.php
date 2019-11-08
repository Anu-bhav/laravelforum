<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\AuthenticatesUser;
use App\LoginToken;
use App\User;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function email_login()
    {
        return view('auth.email_login');
    }

    public function postLogin(AuthenticatesUser $auth)
    {

        $auth->invite();

        return redirect('email_login')->with('success', 'Login Email has been sent. Kindly check your email.');
    }

    public function authenticate(LoginToken $token)
    {
        //dd($token->user->id);
        Auth::loginUsingId($token->user->id);
        return redirect()->action('DashboardController@index')->with('success', 'You have been logged in.');
        // $user_id = auth()->user()->id;
        // $user = User::find($user_id);          
        // return view('dashboard')->with('posts', $user->posts);
    }
}
