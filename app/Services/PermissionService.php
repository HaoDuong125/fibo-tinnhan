<?php

namespace App\Services;

use App\Enums\EUserRole;
use App\Repositories\PermissionRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PermissionService {

    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function getPermission($userId)
    {
        return $this->permissionRepository->getPermission($userId);
    }

    public function insertPermission($data)
    {
        return $this->permissionRepository->insertPermission($data);
    }

    public function permissionSidebar()
    {
        $listAuthor = [];
        // Tài khoản
        $subPageInfoAccountAdmin[] = array('name_page' => 'Khách hàng', 'active_page' => 'list-account', 'route' => 'admin.list.account.view');
        $listAuthor[] = array('name_page' => 'Tài Khoản', 'icon' => 'fas fa-users', 'sub_pages' => $subPageInfoAccountAdmin);

        return $listAuthor;
    }

    // Not use yet
    private function checkPermission($code)
    {
        if (Session::has('AUTHORIZATION_USER')) {
            $arr_group_permission = session('AUTHORIZATION_USER');
            foreach ($arr_group_permission as $key => $value) {
                if($value->key_id === $code) {
                    return true;
                }
            }
            return false;
        } else {
            if (Auth::user()->role == EUserRole::ADMIN) {
                return true;
            }
            return false;
        }
    }
}
