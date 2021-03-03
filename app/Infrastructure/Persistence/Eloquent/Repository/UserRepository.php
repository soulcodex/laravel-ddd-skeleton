<?php

namespace App\Infrastructure\Persistence\Eloquent\Repository;

use App\Domain\Entity\User\User;
use App\Domain\Entity\User\UserRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\AbstractRepository;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @param int $id
     * @return User|null
     */
    public function find(int $id): ?User
    {
        return $this->model->find($id);
    }

    /**
     * @param int $id
     * @return User
     * @throws ModelNotFoundException
     */
    public function findOrFail(int $id): User
    {
        $user = $this->find($id);

        if($user instanceof User) {
            return $user;
        }

        throw new ModelNotFoundException(
            sprintf(
                'Model %s was not found with id %d',
                User::class,
                $id
            )
        );
    }

    /**
     * @param User $user
     * @return User
     * @throws Exception
     */
    public function add(User $user): User
    {
        $user = $this->find($user->id);

        if($user instanceof User) {
            throw new Exception('Exist');
        }

        return $user->create();
    }

    /**
     * @param int $id
     * @param array $attributes
     */
    public function update(int $id, array $attributes): void
    {
        $user = $this->findOrFail($id);

        $user->update($attributes);
    }

    /**
     * @param int $id
     * @throws Exception
     */
    public function delete(int $id): void
    {
        $user = $this->findOrFail($id);

        $user->delete();
    }

    /**
     * @param int $itemsPerPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $itemsPerPage): LengthAwarePaginator
    {
        return $this->getQueryBuilder()->paginate($itemsPerPage);
    }

    /**
     * @return Builder
     */
    public function getQueryBuilder(): Builder
    {
        return $this->model->newQuery();
    }
}
