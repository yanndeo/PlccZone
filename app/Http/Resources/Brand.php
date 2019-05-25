<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;


class Brand extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      //  return parent::toArray($request);


        return [
            'id' =>$this->id,
            'name'=> $this->name,
            'comment'=>$this->comment,
            'count_pb' => count( $this->products),
            'slug'=>$this->slug,

        ];
    }
}
