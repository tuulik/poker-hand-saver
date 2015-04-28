<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\EditUserRequest;
use Entrust;
use Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller {

  function view(User $user) {
    return view('viewUser', ['user' => $user]);
  }

  function getList() {
    $users = User::all();
    return view('userList', ['users' => $users]);
  }

  function edit(User $user) {
    if(Entrust::can('edit-user') || Auth::user()->id == $user->id)
      return view('editUser', ['user' => $user]);
    abort('403');
  }

  function update(User $user, EditUserRequest $request)
  {
    if (Entrust::can('edit-user') || Auth::user()->id == $user->id) {
      $user->name = $request->name;
      $user->email = $request->email;

      if ($request->hasFile('avatar')) {
        if ($user->avatar != null) {
          File::delete(public_path() . '/avatars/' . $user->avatar);
        }
        $avatarFileName = $user->name . 'avatar' . '.' . Request::file('avatar')->guessExtension();
        $avatarPath = public_path() . '/avatars';
        $request->file('avatar')->move($avatarPath, $avatarFileName);

        $user->avatar = $avatarFileName;
      }
      $user->save();
      if (Entrust::hasRole('admin'))
        return redirect('list-users');
      return redirect('view-user/' . $user->id);
    }
    abort('403');
  }

  function delete(User $user) {
    if (Entrust::can('delete-user') || Auth::user()->id == $user->id) {
      $user->delete();
      if(Entrust::hasRole('admin'))
        return redirect('list-users');
      return redirect('/');
    }
    abort('403');
  }
}