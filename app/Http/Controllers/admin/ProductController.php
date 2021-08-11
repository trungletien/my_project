<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProductController
 * @package App\Http\Controllers\admin
 */
class ProductController extends Controller
{
    /**
     * @var ProductRepositoy
     */
    private $productRepository;

    /**
     * @var ProductService
     */
    private $productService;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * ProductController constructor.
     */
    public function __construct(ProductRepository $productRepository, ProductService $productService, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a list of the re  source
     */
    public function index(Request $request)
    {
       $products = $this->productRepository->getListProduct($request->keySearch);
       $data = [
           'products' => $products,
       ];
       return view('admin.pages.product.index', $data);
    }

    /**
     * Show the form for creating resource
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->categoryRepository->getListCategory('');

        $data = [
            'categories' => $categories,
        ];

        return view('admin.pages.product.create', $data);
    }

    /**
     * Store a newly resource in storage
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->productService->insertOrUpdate($request);

        return redirect()->route('admin.products.index');
    }

    /**
     * Show the form for editing resource
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = $this->categoryRepository->getListCategory('');

        $data = [
            'product' => $product,
            'categories' => $categories,
        ];

        return view('admin.pages.product.edit', $data);
    }

    /**
     *
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->productService->insertOrUpdate($request, $id);

        return redirect()->route('admin.products.index');

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::disk('public')->delete('/product/' . $product->image);
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
