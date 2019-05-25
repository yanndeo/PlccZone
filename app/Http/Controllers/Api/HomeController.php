<?php

namespace App\Http\Controllers\Api;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    private $categoryRepository;

    /**
     * HomeController constructor.
     * @param CategoryRepository $categoryRepository
     */

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;

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




    //SubMenuu Brands function
}
