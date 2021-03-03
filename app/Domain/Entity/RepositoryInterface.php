<?php

namespace App\Domain\Entity;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

interface RepositoryInterface
{
    /**
     * @param int $itemsPerPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $itemsPerPage): LengthAwarePaginator;

    /**
     * @return Builder
     */
    public function getQueryBuilder(): Builder;
}
