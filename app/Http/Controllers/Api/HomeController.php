<?php

namespace App\Http\Controllers\Api;

use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    private $categoryRepository;

    private  $brandRepository;

    /**
     * HomeController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository, BrandRepository $brandRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoryRepository->limitCategory(8);


        return view('layouts/home', compact('categories'));
    }


    //SubMenu Category function

    public function subMenu()
    {

        $menu_categories = $this->categoryRepository->limitCategory(8);

        dd($menu_categories);

        $menu_brands = $this->brandRepository->limitBrand(5);

        return view('base/app', compact('menu_categories'));


    }



    //SubMenuu Brands function
}
