<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Brand;
use App\Models\Category;

class Product extends Model
{
    protected $fillable=[
        'name',
        'slug',
        'reference',
        'description',
        'brand_id',
        'category_id' ,
        'availability',
        'state', //etat : neuf , Remis à neuf,réparation,
        'height',
        'width',
        'surface'];

    protected $appends = ['brand_name','category_title'] ;


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model){

            $model->slug = str_slug($model->name);
        });
    }

    /* *******************************  RELATIONS ******************* **/

    public function brand()
    {
        return $this->belongsTo(Brand::class);   //appartient à une marque
    }


    public function category()
    {
        return $this->belongsTo(Category::class); //appatient à une categorie
    }

    public function specifities()
    {
        return $this->belongsTo();   //appartient à une marque
    }

    /* *******************************  ACCESSEUR ******************* **/

    public function getBrandNameAttribute(){

        return $this->brand->name ;
    }

    public function getCategoryTitleAttribute(){

        return $this->category->title ;
    }



    /* *******************************  SCOPES EXTEND METHOD MODEL  ******************* **/

    public function scopeInStock($query)
    {
        return $query->where('etat_stock', 1)->count();
    }

    public function scopeOutStock($query)
    {
        return $query->where('etat_stock', 0)->count();
    }

    public function scopeCountPb($query)
    {
        return $query->count();
    }


}
