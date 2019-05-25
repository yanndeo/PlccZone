<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'=>$this->id,
            'name'=> $this->name,
            'reference'=>$this->reference,
            'brand_name'=>$this->brand_name,
            'brand_id'=>$this->brand->id,
            'category_id'=>$this->category->id,
            'category_title'=>$this->category_title,
            'description'=>Str::limit($this->description,18, '...'),
            'etat_stock' =>$this->etat_stock,
            'slug'=>$this->slug,


        ];
    }
}
