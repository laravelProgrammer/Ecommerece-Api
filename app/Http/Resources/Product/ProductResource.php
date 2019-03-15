<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
            'ProductName'=>$this->name,
            'Description'=>$this->detail,
            'Discount'=> $this->discount,
            'Price'=>$this->price,
            'Stock'=>$this->stock


                ];
    }
}
