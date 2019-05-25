<?php


namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\contrats\ProductInterface;
use Illuminate\Database\Query\Builder;

class ProductRepository implements ProductInterface
{
    private $product;

    public function __construct(Product $product )
    {
        $this->product = $product;

    }

    /**
     * @return mixed
     */
    public function allArticle()
    {

    }

    /**
     * @param array $data
     * @return mixed
     */
    public function storedArticle(array $data)
    {
        // TODO: Implement storedArticle() method.
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updatedArticle(array $data, $id)
    {
        // TODO: Implement updatedArticle() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deletedArticle($id)
    {
        // TODO: Implement deletedArticle() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showArticle($id)
    {
        return $this->product->where('id',$id)->first();
    }


    public function queryBuilderProduct()
    {
        //return $this->product->select('id','title','description','avatar');
    }





}