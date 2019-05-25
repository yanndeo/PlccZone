<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Repositories\contrats\BrandInterface;


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
     * @param array $data
     * @return mixed
     */
    public function storedBrand(array $data)
    {
        // TODO: Implement storedBrand() method.
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
        // TODO: Implement showBrand() method.
    }

    /**
     * @return mixed
     */

    public function queryBuilderBrand()
    {
        return $this->brand->select('id','name','comment','avatar')->orderBy('name', 'desc');
    }





}