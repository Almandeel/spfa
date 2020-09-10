<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Vendor;
use App\Setting;
use App\Employee;
use App\Permission;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:users-create')->only(['create', 'store']);
        $this->middleware('permission:users-read')->only(['index', 'show']);
        $this->middleware('permission:users-update')->only(['edit', 'update']);
        $this->middleware('permission:users-delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('dashboard.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        return view('dashboard.users.create',compact('permissions', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'username'              => ['required', 'string', 'max:255', 'unique:users'],
            'phone'                 => ['required', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:6'],
            'name'                  => ['required', 'string', 'max:255'],
            'graduation_Date'       => ['required', 'max:255'],
            'university'            => ['required', 'string', 'max:255'],
            'country'               => ['required', 'string', 'max:255'],
        ]);
        
        $request_data = $request->except('password');
        $request_data['password'] = bcrypt($request->password);
        $user = User::create($request_data);

        
        $user->roles()->attach($request->roles);

        $user->permissions()->attach($request->permissions);
        
        session()->flash('success', 'global.create_success');

        if($request->next == 'back') {
            return back();
        }else {
            return redirect()->route('users.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        
        $permissions = Permission::all();
        $roles = Role::all();

        // find the permissions of user
        $user_permissions = [];
        $user_permissions = array_column($user->permissions->toArray(), 'id');

        
        return view('dashboard.users.edit', compact('user', 'permissions', 'roles', 'user_permissions'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            'username'      => 'required | string | max:100 | min:3|regex:/^[\p{L} ]+$/u',
            'password'      => 'nullable | string | min:6',
        ]);
    
        $request_data = $request->except('password');

        if($request->password) {
            $request_data['password'] = bcrypt($request->password);
        }

        $user->update($request_data);

        $user->roles()->sync($request->roles);

        $user->permissions()->sync($request->permissions);
        
        session()->flash('success', 'global.update_success');

        if($request->next == 'back') {
            return back();
        }else {
            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(file_exists(public_path('images/members' . DIRECTORY_SEPARATOR . $user->image)))  unlink(public_path('images/members' . DIRECTORY_SEPARATOR . $user->image));
        $user->roles()->detach();

        $user->permissions()->detach();

        foreach($user->commits as $commit) {
            $commit->delete();
        }

        $user->delete();

        session()->flash('success', 'global.delete_success');

        return redirect()->route('users.index');

    }


    public function profile(Request $request) {
        $user = User::find(auth()->user()->id);

        request()->validate([
            'username'              => ['required', 'string', 'max:255', 'unique:users,username,' . auth()->user()->id],
            'phone'                 => ['required', 'max:255', 'unique:users,phone,' . auth()->user()->id],
            'password'              => ['nullable', 'string', 'min:6'],
            'name'                  => ['required', 'string', 'max:255'],
            'graduation_Date'       => ['required', 'max:255'],
            'university'            => ['required', 'string', 'max:255'],
            'country'               => ['required', 'string', 'max:255'],
        ]);
    
        $request_data = $request->except('password');

        if($request->password) {
            $request_data['password'] = bcrypt($request->password);
        }

        $user->update($request_data);

        session()->flash('success', 'global.update_success');
        
        return back();
    }

    public function status(Request $request) {
        $user = User::find($request->id);
        if($user){
            $user->update([
                'status' => $request->status
            ]);
            session()->flash('success', 'global.update_success');
            return back();
        }else {
            session()->flash('success', 'global.update_fail');
            return back();
        }
    }

    public function membersDetiels() {
        $setting = Setting::first();
        $members = User::where('status', 1)->where('id', '!=', 1)->get();
        $pdf = PDF::loadView('dashboard/users/membersDetiles', ['members' => $members , 'setting' => $setting ]);
        return $pdf->stream();
    }
}
