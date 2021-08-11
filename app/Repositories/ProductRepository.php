<?php

namespace App\Repositories;

use App\Model\Product;

/**
 * Class ProductRepository
 * @package App\Repositories
 */
class ProductRepository
{
    /**
     * @var Product
     */
    private $model;

    /**
     * ProductRepository constructor.
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getListProduct($keySearch = null)
    {
        return $this->model->searchProduct($keySearch ?? null)->with(['categoryEntity'])->get();
    }
}
