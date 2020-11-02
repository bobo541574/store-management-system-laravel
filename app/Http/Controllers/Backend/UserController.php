<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\ModelHasRoles;
use Laravel\Ui\Presets\React;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        (old('row') > 0) ? ($rowCount = count(old('row')) - 1) : ($rowCount = 0);
        $user = 0;
        $states = State::all();

        return view('backend.users.create', compact('states', 'rowCount', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        dd($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assignCreate($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.users.assign', compact('roles', 'user'));
    }

    public function assignStore(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $user->syncRoles($request->get('role'));
    }
}