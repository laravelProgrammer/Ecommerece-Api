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
            'Stock'=>$this->stock == 0 ? 'Out Of Stock' :  $this->stock,
            'TotalPrice'=> round(((1-($this->discount/100))*$this->price),2),
            'Rating' => $this->review->count() >0 ? round($this->review->avg('star')) : 
            'no rating yet',
            'href'=>[
                'Reviews' => route('reviews.index',$this->id)
            ]


            // 'rating' => round($this->review->sum('star')/$this->review->count()),
        ];
    }
}
