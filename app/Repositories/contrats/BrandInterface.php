<?php namespace App\Repositories\contrats;

interface BrandInterface
{
    public function allBrands();

    public function store( $data);

    public function updatedBrand(array $data, $id);

    public function deletedBrand($id);

    public function showBrand($id);
}