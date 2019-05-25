<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable=['name','comment','avatar', 'slug'];

    protected $appends = ['categories_list'] ;


    /*
     public function scopeSubmenu($query)
    {
        return $query->select('id','name')->limit(5)->orderBy('name','desc');
    }
    */

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }



    public function products()
    {
        return $this->hasMany(Product::class);
    }


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model){

            $model->slug = str_slug($model->name);
        });
    }


    /**** Methods ***/

    public function getCategoriesListAttribute()
    {
        if($this->id){
            // return $this->categories()->pluck('title','avatar'); //make object
            return $this->categories;
        }
    }

    public function getProductsListAttribute()
    {
        if($this->id){
            // return $this->categories()->pluck('title','avatar'); //make object list
            return $this->products;
        }
    }


    public function setCategoriesListAttribute($value)
    {
        return $this->tags()->sync($value);

    }
}
