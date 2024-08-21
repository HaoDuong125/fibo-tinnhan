<?php

namespace App\Services;

use App\Repositories\UserRepository;

class AccountService {

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function searchAccount($data)
    {
        return $this->userRepository->getAllAccount($data);
    }

    public function searchAccountInternal($data)
    {
        return $this->userRepository->searchAccountInternal($data);
    }

    public function getUserById($idUser)
    {
        return $this->userRepository->getUserById($idUser);
    }

    public function chnagePassword($input)
    {
        return $this->userRepository->chnagePassword($input);
    }

    public function stopActiveAccountUser($userId)
    {
        return $this->userRepository->stopActiveAccountUser($userId);
    }

    public function activeAccountUser($userId)
    {
        return $this->userRepository->activeAccountUser($userId);
    }

    public function stopActivePartner($userId)
    {
        return $this->userRepository->stopActivePartner($userId);
    }

    public function activePartner($userId)
    {
        return $this->userRepository->activePartner($userId);
    }

    public function changePasswordAPI($input)
    {
        return $this->userRepository->changePasswordAPI($input);
    }

    public function createAccountCustomer($data)
    {
        return $this->userRepository->saveAcountForCustomer($data);
    }

    public function updateAccount($data)
    {
        return $this->userRepository->updateAccount($data);
    }
}
