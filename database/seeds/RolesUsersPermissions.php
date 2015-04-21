<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class RolesUsersPermissions extends Seeder {

  function run()
  {
    DB::table('roles')->delete();
    DB::table('permissions')->delete();
    DB::table('users')->delete();

    $adminRole = new Role();
    $adminRole->name = 'admin';
    $adminRole->save();

    $adminUser = new User();
    $adminUser->name = 'admin';
    $adminUser->email = 'admin@pokerhand.club';
    $adminUser->password = '$2y$10$/yu.L87Pq9YNVzAlHhQzROLLTatNx1x1TMwC..bQdosEtFSUQdREG';
    $adminUser->save();
    $adminUser->attachRole($adminRole);

    $listUsers = new Permission();
    $listUsers->name = 'list-users';
    $listUsers->save();

    $editUser = new Permission();
    $editUser->name = 'edit-user';
    $editUser->save();

    $deleteUser = new Permission();
    $deleteUser->name = 'delete-user';
    $deleteUser->save();

    $adminRole->attachPermissions([$listUsers, $editUser, $deleteUser]);
  }
}