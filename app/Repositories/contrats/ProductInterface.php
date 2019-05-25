<?php namespace App\Repositories\contrats;

interface ProductInterface
{
    public function allArticle();

    public function storedArticle(array $data);

    public function updatedArticle(array $data, $id);

    public function deletedArticle($id);

    public function showArticle($id);
}