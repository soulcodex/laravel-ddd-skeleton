<?php

namespace App\Domain\Entity\User;

use App\Domain\Entity\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface UserRepositoryInterface extends RepositoryInterface
{
    /**
     * @return Collection<int, User>
     */
    public function all(): Collection;

    /**
     * @param int $id
     * @return User|null
     */
    public function find(int $id): ?User;

    /**
     * @param int $id
     * @throws ModelNotFoundException
     *
     * @return User
     */
    public function findOrFail(int $id): User;

    /**
     * @param User $user
     * @return User
     */
    public function add(User $user): User;

    /**
     * @param int $id
     * @param array $attributes
     * @return void
     */
    public function update(int $id, array $attributes): void;

    /**
     * @param int $id
     */
    public function delete(int $id): void;
}
