<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getAllWithOrderAndPaginate($orderBy, $limit, $page);

    public function getProductOfUser($user, $role, $order);

    public function delete($user);
}
