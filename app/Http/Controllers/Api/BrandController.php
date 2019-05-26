<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use App\Repositories\BrandRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
        /**
         * @var BrandRepository
         */
        private $brandRepository;

        /**
         * BrandController constructor.
         * @param BrandRepository $brandRepository
         */
        public function __construct( BrandRepository $brandRepository)
        {

            $this->brandRepository = $brandRepository;
        }


        public function index()
        {
            $brands= $this->brandRepository->paginateCategory(9);
            //dd($brands->total());
            return view('layouts/brands', compact('brands'));
        }





    /**
     * show list articles associate
     */
    public function show_articles()
    {

        return view();
    }

    /**
     * show list Categories associates
     */
    public function showCategories(String $slug , Brand $brand)
    {
        //Check if slug has don't been modified

        if ($brand->slug !== $slug){

            return abort(404);
        }

        //else that all is ok.
        return view('layouts/brand', [
            'brand'=> $brand,
            'categories'=>$brand->categories_list
        ]);

    }





}
