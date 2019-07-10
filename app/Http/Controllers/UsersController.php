<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $create_user_validation = [
        'role' => 'required',
        'first_name' => 'required|min:2|max:15',
        'last_name' => 'required|min:2|max:15',
        'username' => 'required|unique:users|min:4|max:15',
        'email' => 'required|unique:users|email',
        'password' => 'required|min:4|max:25',
        'confirm_password' => 'required|min:4|max:25|same:password',
    ];

    private $update_user_validation = [
        'role' => 'required',
        'first_name' => 'required|min:2|max:15',
        'last_name' => 'required|min:2|max:15',
        'username' => 'required|min:4|max:15',
        'email' => 'required|email',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        $viewData = [
            'users' => $users
        ];

        return view('users.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->create_user_validation);

        $newUser = new User();

        $newUser->role = $request->role;
        $newUser->first_name = $request->first_name;
        $newUser->last_name = $request->last_name;
        $newUser->username = $request->username;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);
        $newUser->created_at = Carbon::now();

        $newUser->save();

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // N/A for now
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id_count = count(User::all());

        if($id > $user_id_count){
            abort(404);
        } else {
            return view('users.edit', [
                'user' => User::findOrFail($id)
            ]);
        }
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
        $validated_data = $request->validate($this->update_user_validation);

        $user = User::find($id);
        $user->update($validated_data);

        $user->save();

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Never delete. SOft delete is implemented below
    }

    /**
     * Soft delete or disable the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        $user = User::find($id);

        $user->is_disabled = 1;
        $user->save();

        return redirect('/users');
    }

    /**
     * Soft delete or disable the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enable($id)
    {
        $user = User::find($id);

        $user->is_disabled = 0;
        $user->save();

        return redirect('/users');
    }
}
