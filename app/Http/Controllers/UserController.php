<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user_index', compact('users'));
    }
    public function create()
    {
        return view('admin.user_create');    
    }
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect('/user/index');
    }
    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.user_edit', compact('user')); 
    }
    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $user -> update($request->all());
        return redirect('/user/index');
    }
    public function destroy($user_id)
    {
        $user = User::find($user_id);
        $user -> delete();
        return redirect('/user/index');
    }
}
