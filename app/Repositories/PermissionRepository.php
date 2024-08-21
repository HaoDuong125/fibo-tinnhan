<?php

namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository
{
    public function __construct()
    {
        
    }

    public function getPermission($userId)
    {
        $result = Permission::where('user_id', $userId)->get();
        return $result;
    }

    public function savePermission($user_id, $key_id)
    {
        $permission = new Permission();
        $permission->user_id = $user_id;
        $permission->key_id = $key_id;
        $permission->save();
    }

    public function insertPermission($data)
    {
        return Permission::insert($data);
    }

    public function deletePermission($user_id)
    {
        return Permission::where('user_id', $user_id)->delete();
    }
}
