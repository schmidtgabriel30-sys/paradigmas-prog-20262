<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;

class UserService extends BaseService
{
    public function __construct(private UserRepository $userRepository)
    {
        parent::__construct($userRepository);
    }

    public function getWithFilters(array $data)
    {
        return $this->userRepository->getWithFilters($data);
    }
}
