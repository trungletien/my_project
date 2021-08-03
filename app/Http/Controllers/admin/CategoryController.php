<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class CategoryController extends Controller
{
    public function index()
    {
        dd("test");
//        dump(route('admin.categories.index'));die;
        return view("admin.pages.category.index");
    }

    public function create()
    {
        return view("admin.pages.category.index");
    }
}
