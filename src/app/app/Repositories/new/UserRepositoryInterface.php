<?php

namespace Others\Repository;

interface UserRepositoryInterface
{
    public function getAllUsers($request):collection;
}