<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\EditUserRequest;

class UserController extends Controller {

  function getList() {
    $users = User::all();
    return view('userList', ['users' => $users]);
  }

  function edit(User $user) {
    return view('editUser', ['user' => $user]);
  }

  function update(User $user, EditUserRequest $request) {
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();
    return view('userEdited');
  }

  function delete(User $user) {
    $user->delete();
    return view('userEdited');
  }
}