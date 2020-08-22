<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:roles-create')->only(['create', 'store']);
        $this->middleware('permission:roles-read')->only(['index', 'show']);
        $this->middleware('permission:roles-update')->only(['edit', 'update']);
        $this->middleware('permission:roles-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('dashboard.users.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('dashboard.users.roles.create', compact('permissions'));
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
            // 'name' => 'required | string | max:100 | min:3 |regex:/^[\p{L} ]+$/u',
        ]);

        $role = Role::create($request->all());

        $role->attachPermissions($request->permissions);


        session()->flash('success', 'global.create_success');
        return redirect()->route('roles.index');

        // if($request->next == 'back') {
        //     return back();
        // }else {
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('dashboard.users.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        request()->validate([
            'name' => 'required | string | max:100 | min:3 |regex:/^[\p{L} ]+$/u',
        ]);

        $role->update($request->all());

        $role->detachPermissions();
        $role->attachPermissions($request->permissions);


        session()->flash('success', 'global.update_success');
        return back();
        // return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
