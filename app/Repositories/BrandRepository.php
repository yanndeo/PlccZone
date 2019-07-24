<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Repositories\contrats\BrandInterface;
use Image;


class BrandRepository implements BrandInterface
{

    private $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }


    /**
     * @return mixed
     */
    public function allBrands()
    {
        return $this->queryBuilderBrand()->get();
    }


    /**
     * @param $hit
     * @return mixed
     */

    public function paginateCategory($hit)
    {
        return $this->queryBuilderBrand()->paginate($hit);
    }



    public function limitBrand($limit)
    {
        return $this->queryBuilderBrand()->limit($limit)->get();
    }




    /**
     * 
     */
    public function store( $request)
    {
        $brand = new $this->brand();
        
        if($request->file){

             $file = $request->file;
             $filename =  time() .'.'.$file->getClientOriginalExtension();
             \Intervention\Image\Facades\Image::make($file)->resize(263,290)->save(public_path('/uploads/brands/'.$filename));

        }else{
            $filename = 'default.jpg';

        }

        $brand->avatar = $filename;
        $brand->name = $request->name;
        $brand->comment = $request->comment;
        $brand->save();

    }




    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updatedBrand(array $data, $id)
    {
        // TODO: Implement updatedBrand() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deletedBrand($id)
    {
        // TODO: Implement deletedBrand() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showBrand($id)
    {
        return $this->queryBuilderBrand()
                    ->whereId($id)
                    ->get();
    }





    /**
     * @return mixed
     */

    public function queryBuilderBrand()
    {
        return $this->brand->select('id','name','comment','avatar')->orderBy('name', 'desc');
    }





}