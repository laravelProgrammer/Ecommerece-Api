<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'ProductName' =>$this->name,
            'TotalPrice'=> round(((1-($this->discount/100))*$this->price),2),
            'Rating' => $this->review->count() >0 ? round($this->review->avg('star')) : 
            'no rating yet',
            'href'=>[
                'link'=>route('products.show',$this->id)
                     ]
                ];
    }
}
