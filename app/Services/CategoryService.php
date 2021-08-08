<?php

namespace App\Services;

use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    public function insertOrUpdate(Request $request, $id = null)
    {
        $category = new Category();

        if (!is_null($id)) {
            $category = Category::find($id);
        }

        $category->name = $request->category_name;
        if ($request->hasFile('category_image')) {
            Storage::delete($category->image);
            $request->category_image->storeAs('', $request->category_image->getClientOriginalName());
            $category->image = $request->category_image->getClientOriginalName();
        }
        $category->save();
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        Storage::delete($category->image);
        $category->delete();
    }
}
