<?php

namespace App\Repositories;

use App\Models\User;
use App\Systems\Repository;

class UserRepository extends Repository
{
    public function getAllUser(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM users");
        $statement->execute();
        $users = $statement->fetchAll(\PDO::FETCH_CLASS, User::class);

        return $users;
    }

    public function getUserById($id): ?User
    {
        $statement = $this->connection->prepare("SELECT * FROM users WHERE id=?");
        $statement->execute([$id]);

        return $statement->fetchObject(User::class);
    }

    public function saveUser(User $user): User
    {
        $statement = $this->connection->prepare("INSERT INTO users (name, email, age) VALUES (?,?,?)");
        $statement->execute([
            $user->name,
            $user->email,
            $user->age,
        ]);

        return $user;
    }

    public function deleteUser(User $user): bool
    {
        $statement = $this->connection->prepare("DELETE FROM users WHERE id=?");
        $statement->execute([$user->id]);

        return true;
    }

    public function updateUser(User $user): User
    {
        $statement = $this->connection->prepare("UPDATE users SET name=?, email=?, age=? WHERE id=?");
        $statement->execute([
            $user->name,
            $user->email,
            $user->age,
            $user->id,
        ]);

        return $user;
    }
}
