<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoryEntity()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function scopeSearchProduct($query, $keySearch = null)
    {
        if (empty($keySearch)) {
            return $query;
        }

        return $query->where('name', 'like', '%' . $keySearch . '%');
    }
}
