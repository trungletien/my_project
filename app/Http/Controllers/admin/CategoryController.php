<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

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
        $this->categoryService->insertOrUpdate($request);

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
        $this->categoryService->insertOrUpdate($request, $id);

        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $this->categoryService->destroy($id);

        return redirect()->route('admin.categories.index');
    }
}
