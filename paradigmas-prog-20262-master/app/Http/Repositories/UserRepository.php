<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(private User $model)
    {
        parent::__construct($model);
    }

    public function getWithFilters(array $data)
    {
        $builder = $this->model->query()->where(function ($query) use($data) {
            if (data_get($data, 'name')) {
                $query->where('name', 'like', '%' . $data['name'] . '%');
            }

            if (data_get($data, 'email')) {
                $query->where('email', 'like', '%' . $data['email'] . '%');
            }
        });

        return $this->index($builder);
    }
}
