<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $data = [
            'categories' => $categories
        ];

        return view("admin.pages.category.index", $data);
    }

    public function create()
    {
        return view("admin.pages.category.create");
    }

    public function store(Request $request)
    {
        $category = new Category();

        $category->name = $request->category_name;
        $category->image = $request->category_image;
        $category->save();

        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        $data = [
            'category' => $category
        ];

        return view("admin.pages.category.edit", $data);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->category_name;
        $category->image = $request->category_image;
        $category->save();

        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
