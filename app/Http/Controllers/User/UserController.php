<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller {

  function getList() {
    $users = User::all();
    return view('userList', ['users' => $users]);
  }

  function edit(User $user) {
    return view('editUser', ['user' => $user]);
  }

  fucntion store()
}