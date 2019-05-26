<?php


namespace App\Repositories;

use App\Repositories\contrats\CategoryInterface;
use App\Models\Category;
use Illuminate\Database\Query\Builder;

class CategoryRepository implements CategoryInterface
{



    private $category;



    public function __construct(Category $category )
    {
        $this->category = $category;

    }



    /**
     * @return mixed
     */
    public function allCategories()
    {

        return $this->queryBuilderCategory()->get();

    }




    public function limitCategory($limit)
    {
        return $this->queryBuilderCategory()->limit($limit)->orderBy('title')->get();
    }



    public function paginateCategory($hit)
    {
        return $this->queryBuilderCategory()->paginate($hit);
    }



    public function listWithBrand()
    {
        return $this->category->select('id','title')->with('brands.products:id')->get();

    }

    /**
     * @param array $data
     * @return mixed
     */
    public function storedCategory(array $data)
    {
        // TODO: Implement storedCategory() method.
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updatedCategory(array $data, $id)
    {
        // TODO: Implement updatedCategory() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deletedCategory($id)
    {
        // TODO: Implement deletedCategory() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showCategory($id)
    {
        // TODO: Implement showCategory() method.
    }


    public function queryBuilderCategory()
    {
         return $this->category->select('id','title','description','avatar', 'slug');
    }





}