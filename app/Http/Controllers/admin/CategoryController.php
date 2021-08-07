<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('category_image')) {
            $request->category_image->storeAs('', $request->category_image->getClientOriginalName());
            $category->image = $request->category_image->getClientOriginalName();
        }

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
        if ($request->hasFile('category_image')) {
            $request->category_image->storeAs('', $request->category_image->getClientOriginalName());
            $category->image = $request->category_image->getClientOriginalName();
        }

        $category->save();

        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        Storage::delete($category->image);
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
