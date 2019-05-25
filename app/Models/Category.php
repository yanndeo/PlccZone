<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['title','description','avatar', 'slug'];

    protected $appends = ['brands_list', 'products_list'] ;

    /* *******************************  RELATIONS ******************* **/


    /** List des fabriquants  associés à cette categorie */

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    /** List des produits liés à la categorie */

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model){

            $model->slug = str_slug($model->title);
        });
    }

    /* *******************************  ACCESSEUR ******************* **/



    /**** Methods ***/

    public function getBrandsListAttribute()
    {
        if($this->id){
            // return $this->categories()->pluck('title','avatar'); //make object list
            return $this->brands()->select('brand_id','name','comment','avatar')->get(); //'avatar'
        }
    }


    public function setBrandsListAttribute($value)
    {
        return $this->tags()->sync($value);

    }

    public function getProductsListAttribute()
    {
        if($this->id){
            // return $this->categories()->pluck('title','avatar'); //make object list
            return $this->products()->count();
        }
    }




    /*
     Maintenant si on veut connaître tous les titres des livres d’un auteur c’est facile :


    \App\Models\Author::find(4)->books->each(function($book)
    {
        echo $book->name, '<br>';
    });
    */

}
