<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $data = $request->only('name','email','password');
        $data['barber_id'] = auth()->user()->id;
        $user = User::create($data);
        $user->password = bcrypt($data['password']);
        $user->save();
        return $user;
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        $data = $request->only('name','email','password');

        if($request->has('password')) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);
        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();

        return ['status' => 'Success', 'operation' => 'delete'];
    }
}
