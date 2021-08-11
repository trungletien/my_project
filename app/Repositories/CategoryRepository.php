<?php

namespace App\Repositories;

use App\Model\Category;

class CategoryRepository
{
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getListCategory($keySearch)
    {
        return $this->model->searchNameCategory($keySearch ?? null)->get();
    }
}
