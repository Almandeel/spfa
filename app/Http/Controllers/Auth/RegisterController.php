<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

use App\Setting;
use App\Network;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    

    public function showRegistrationForm() {
        $setting = Setting::first();
        $contacts = Network::all();
        return view('auth.register', compact('setting', 'contacts'));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();

        $locale = session()->get('locale');

        $request->session()->invalidate();

        Session()->flash('registred', 'global.registred'); 

        session()->put('locale', $locale);

        return $this->loggedOut($request) ?: redirect('/register');
    }

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username'              => ['required', 'string', 'max:255', 'unique:users'],
            'phone'                 => ['required', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:6'],
            'name'                  => ['required', 'string', 'max:255'],
            'graduation_Date'       => ['required', 'max:255'],
            'university'            => ['required', 'string', 'max:255'],
            'country'               => ['required', 'string', 'max:255'],
            'image'                 => ['required', 'image'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/members'), $imageName);

        return User::create([
            'username'              => $data['username'],
            'password'              => Hash::make($data['password']),
            'username'              => $data['username'],
            'phone'                 => $data['phone'],
            'name'                  => $data['name'],
            'graduation_Date'       => $data['graduation_Date'],
            'university'            => $data['university'],
            'country'               => $data['country'],
            'image'                 => $imageName,
        ]);
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    protected function loggedOut(Request $request)
    {
        //
    }
}
