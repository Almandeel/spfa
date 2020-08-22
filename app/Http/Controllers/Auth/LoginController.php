<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Setting;
use App\Network;

use Session;

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

    public function showLoginForm()
    {
        $setting = Setting::first();
        $contacts = Network::all();
        return view('auth.login', compact('setting', 'contacts'));
    }
    

    public function username()
    {
        return 'username';
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if($user->status) {
            return redirect('/');
        }else {
            $this->guard()->logout();

            $locale = Session::get('locale');

            $request->session()->invalidate();

            Session::put('locale',$locale);

            Session()->flash('login_field', 'global.login_field'); 

            return $this->loggedOut($request) ?: redirect('/login');
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $locale = Session::get('locale');

        $request->session()->invalidate();

        Session::put('locale',$locale);

        return $this->loggedOut($request) ?: redirect('/');
    }
}
