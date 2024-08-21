<?php

namespace App\Repositories;

use App\Enums\ERegisterPartnerStatus;
use App\Enums\EUserRole;
use App\Enums\EUserStatus;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function __construct()
    {

    }

    public function getAllUser()
    {
        $result = User::where('status', EUserStatus::ACTIVE)
                        ->where('role', '!=', EUserRole::SUPPER_ADMIN)
                        ->latest()
                        ->get();
        return $result;
    }

    public function getAllAccount(array $data)
    {
        $result = User::where('role', '!=', EUserRole::SUPPER_ADMIN);

        if (!empty($data['infoCustomer'])) {
            $result = $result->where(function ($query) use ($data) {
                $query->where('email', 'like', '%'.$data['infoCustomer'].'%')
                             ->orwhere('name', 'like', '%'.$data['infoCustomer'].'%')
                             ->orwhere('phone', 'like', '%'.$data['infoCustomer'].'%');
            });

        }
        if (!empty($data['statusSearch']) && $data['statusSearch'] !== 'ALL') {
            $result = $result->where('status', $data['statusSearch']);
        }
        if (!empty($data['statusPartnerSearch']) && $data['statusPartnerSearch'] !== 'ALL') {
            $result = $result->where('register_partner_status', $data['statusPartnerSearch']);
        }
        if (!empty($data['fromDate'])) {
            $result = $result->where('created_at', '>', $data['fromDate']);
        }
        if (!empty($data['toDate'])) {
            $result = $result->where('created_at', '<', $data['toDate']);
        }
        return ($data['type'] === 'SEARCH') ? $result->latest()->paginate(20)
                                            : $result->latest()->get(['full_name', 'email', 'phone', 'address', 'status', 'created_at']);
    }

    public function searchAccountInternal(array $data)
    {
        $result = User::whereIn('role',[ EUserRole::SUPPER_ADMIN, EUserRole::ADMIN]);

        if (!empty($data['infoCustomer'])) {
            $result = $result->where(function ($query) use ($data) {
                $query->where('email', 'like', '%'.$data['infoCustomer'].'%')
                             ->orwhere('name', 'like', '%'.$data['infoCustomer'].'%')
                             ->orwhere('phone', 'like', '%'.$data['infoCustomer'].'%');
            });

        }
        if (!empty($data['statusSearch']) && $data['statusSearch'] !== 'ALL') {
            $result = $result->where('status', $data['statusSearch']);
        }
        if (!empty($data['fromDate'])) {
            $result = $result->where('created_at', '>', $data['fromDate']);
        }
        if (!empty($data['toDate'])) {
            $result = $result->where('created_at', '<', $data['toDate']);
        }
        return ($data['type'] === 'SEARCH') ? $result->latest()->paginate(20)
                                            : $result->latest()->get(['full_name', 'email', 'phone', 'address', 'status', 'created_at']);
    }



    public function saveUser($name, $email, $password)
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();
        return $user;
    }

    public function updatePassword($user_id, $password)
    {
        $user = User::findOrFail($user_id);
        $user->password = Hash::make($password);
        $user->save();
        return $user;
    }

    public function chnagePassword($input)
    {
        $user = User::findOrFail($input['userId']);
        $user->password = Hash::make($input['passwordCustomer']);
        $user->save();
        return $user;
    }

    public function stopActiveAccountUser($user_id)
    {
        return User::where('id', $user_id)->update(['status' => EUserStatus::CANCEL]);
    }

    public function activeAccountUser($user_id)
    {
        return User::where('id', $user_id)->update(['status' => EUserStatus::ACTIVE]);
    }

    public function stopActivePartner($user_id)
    {
        return User::where('id', $user_id)->update(['register_partner_status' => ERegisterPartnerStatus::CANCEL]);
    }

    public function activePartner($user_id)
    {
        return User::where('id', $user_id)->update(['register_partner_status' => ERegisterPartnerStatus::ACTIVE]);
    }

    public function saveAcountForCustomer(array $data)
    {
        try {
            $table = new User;
            $table->name = $data['name'];
            $table->email = $data['email'];
            $table->password = Hash::make($data['passwordWebsite']);
            $table->address = $data['address'];
            $table->province_id = $data['province_id'];
            $table->district_id = $data['district_id'];
            $table->ward_id = $data['ward_id'] ?? null;
            $table->phone = $data['phone'];
            $table->more_info = $data['moreInfo'];
            $table->status = EUserStatus::ACTIVE;
            $table->role = $data['role'] ?? EUserRole::USER;
            $table->save();
            return $table;
        } catch (\Exception $e) {
            logger($e->getMessage());
            return false;
        }

    }

    public function updateAccount($data) {
        $table = User::where('id', $data['userId'])->first();
        $table->name = $data['name'];
        $table->email = $data['email'];
        $table->address = $data['address'];
        $table->phone = $data['phone'];
        $table->province_id = $data['province_id'];
        $table->district_id = $data['district_id'];
        $table->ward_id = $data['ward_id'] ?? null;
        $table->more_info = $data['moreInfo'];
        if (!empty($data['role'])) {
            $table->role = $data['role'];
        }
        $table->save();
        return $table;
    }

    public function getUserById($idUser)
    {
        return User::where('id', $idUser)->first();
    }

    public function getUserByUUID($idUser)
    {
        return User::where('uuid', $idUser)->first();
    }
}
