<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function product()
    {
        return $this->hasMany(Product::class, 'category', 'id');
    }

    public function scopeSearchNameCategory($query, String $keySearch = null)
    {
        if (empty($keySearch)) {
            return $query;
        }

        return $query->where('name', 'like', '%' . $keySearch . '%');
    }
}
