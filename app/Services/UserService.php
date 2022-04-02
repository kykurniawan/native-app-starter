<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUser(): array
    {
        return $this->userRepository->getAllUser();
    }

    public function getUserById($id): ?User
    {
        return $this->userRepository->getUserById($id);
    }

    public function createUser($name, $email, $age): User
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->age = $age;

        return $this->userRepository->saveUser($user);
    }

    public function deleteUser($id)
    {
        $user = $this->userRepository->getUserById($id);
        return $this->userRepository->deleteUser($user);
    }

    public function updateUser($user)
    {
        return $this->userRepository->updateUser($user);
    }
}
