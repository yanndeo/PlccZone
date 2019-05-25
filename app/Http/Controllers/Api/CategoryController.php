<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Api
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * renvois la paination des categories ainsi que les categories->fabriquant->nbPbr
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoryRepository->paginateCategory(6);

        $catSidebar = $this->categoryRepository->listWithBrand();  //Sidebar on page Category Page

        return view('layouts/category', [
            'categories'=> $categories,
            'catSidebar'=>$catSidebar
        ]);

    }


    /**
     * show list articles associate
     */
    public function show_articles()
    {

        return view();
    }

    /**
     * show list brands associate
     */
    public function showBrands(String $slug , Category $category)
    {

        dd($category);

    }




}
