<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection ;

use App\Http\Resources\Product  as ProductResource;


class AdminController extends Controller
{



    /**
     * @var BrandRepository
     */
    private $brandRepository;

    /**
     * @var CategoryRepository
     */
    private  $categoryRepository;

    /**
     * @var ProductRepository
     */
    private $productRepository;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        BrandRepository $brandRepository,
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository)
    {
        $this->middleware('auth');

        $this->brandRepository = $brandRepository;

        $this->categoryRepository = $categoryRepository;

        $this->productRepository = $productRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $brands = $this->brandRepository->allBrands();

        $categories = $this->categoryRepository->allCategories();

        //$articles = $this->productRepository->allArticle();


        $articles= ProductResource::collection(Product::all()) ;


        //dd($products);

        return view('dashboard.admin',[
            'brands'=> $brands,
            'categories'=> $categories,
            'articles'=> $articles
        ]);
    }
}
