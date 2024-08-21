<?php

namespace App\Services;

use App\Repositories\PermissionRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserService {

    private $userRepository;
    private $permissionRepository;

    public function __construct(UserRepository $userRepository, PermissionRepository $permissionRepository)
    {
        $this->userRepository = $userRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function getAllUser()
    {
        return $this->userRepository->getAllUser();
    }

    public function saveUser($name, $email, $password, $listKeyPermission)
    {
        DB::beginTransaction();
        $listPermission = array();
        $saveUser = $this->userRepository->saveUser($name, $email, $password);
        if (!isset($saveUser->id)) {
            DB::rollBack();
            return false;
        }
        foreach ($listKeyPermission as $key => $value) {
            $listPermission[] = array('user_id' => $saveUser->id, 'key_id' => $value);
        }
        $savePermission = $this->permissionRepository->insertPermission($listPermission);
        if (isset($savePermission) && isset($saveUser)) {
            DB::commit();
            return true;
        } else {
            DB::rollBack();
            return false;
        }
    }

    public function updatePassword($user_id, $password)
    {
        return $this->userRepository->updatePassword($user_id, $password);
    }

    public function stopActiveAccountUser($user_id)
    {
        return $this->userRepository->stopActiveAccountUser($user_id);
    }

    public function activeAccountUser($user_id)
    {
        return $this->userRepository->activeAccountUser($user_id);
    }

    public function checkEmailExist($email)
    {
        return $this->userRepository->checkEmailExist($email);
    }

    public function checkUserNameExist($userName)
    {
        return $this->userRepository->checkUserNameExist($userName);
    }

    public function getUserById($userId)
    {
        return $this->userRepository->getUserById($userId);
    }

    public function getUserByUUID($userUUID)
    {
        return $this->userRepository->getUserByUUID($userUUID);
    }

}
