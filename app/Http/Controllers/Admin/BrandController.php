<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Repositories\BrandRepository;
use Illuminate\Support\Facades\Validator;
use Image;


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




    public function create(BrandRequest $request)
    {

            if(request()->ajax())

              return $this->brandRepository->store($request);

            else
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur serveur'
                ])->status(500);

    }




}
