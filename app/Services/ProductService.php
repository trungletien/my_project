<?php

namespace App\Services;

use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService
{
    /**
     * ProductService constructor.
     */
    public function __construct()
    {
    }

    public function insertOrUpdate(Request $request, $id = null)
    {
        $product = new Product();

        if (!empty($id)) {
            $product = Product::find($id);
        }

        $product->category = $request->product_category;
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->price = $request->product_price;

        if ($request->hasFile('product_image')) {
            if (!empty($id)) {
                Storage::disk('public')->delete('/product/' . $product->image);
            }
            $request->product_image->storeAs('/product', $request->product_image->getClientOriginalName());
            $product->image = $request->product_image->getClientOriginalName();
        }

        $product->save();
    }
}
