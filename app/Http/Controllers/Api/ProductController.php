<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

use Illuminate\Support\Collection ;

use App\Http\Resources\Product  as ProductResource;
use App\Http\Resources\Brand as BrandResource;
use App\Http\Resources\Category as CategoryResource;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{


    /**
     * @var ProductRepository
     */
    private $productReporitory;

    /**
     * ProductController constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct( ProductRepository $productRepository)
    {
        $this->productReporitory = $productRepository;

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        return view('layouts/articles_table');
    }


    /**
     * /articles datas
     */
    public function loadProductApi()
    {
        $brands = BrandResource::collection(\App\Models\Brand::all());

        $products= ProductResource::collection(Product::all()) ;

        $categories = CategoryResource::collection(Category::all());

        return [
            'brands'=>$brands ,
            'products'=> $products,
            'categories' => $categories
        ];

    }

    /**
     * search bar with query param
     */

    public function searchLike(Request $request)
    {

        if ($request->item){
           return
            $products = Product::take(6)
                                ->where('reference', 'LIKE', "%$request->item%")
                                ->orWhere('name', 'LIKE', "%$request->item%")
                                ->get()->toJson();

           }

    }



    /**
     * @param String $slug
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(String $slug , $id )
    {

        $product = $this->productReporitory->showArticle($id);

        if ($product->slug !== $slug){
            return back();
        }

        return view('layouts/article_single', compact('product'));
    }
}
