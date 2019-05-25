<?php namespace App\Repositories\contrats;

interface CategoryInterface
{
    public function allCategories();

    public function storedCategory(array $data);

    public function updatedCategory(array $data, $id);

    public function deletedCategory($id);

    public function showCategory($id);
}