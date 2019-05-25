<?php

namespace App\Http\Controllers\Api;

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
        return view('layouts/brand', compact('brands'));
    }
}
