<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        // transforming response of the api


        return [
            'name' => $this->name, // key = name and value = name as the table column is named
            'description' => $this->detail,
            'price' => $this->price,
            'stock' => $this->stock == 0 ? 'Out of Stock' : $this->stock,
            'discount' => $this->discount,
            'totalPrice' => round((1 - ($this->discount/100)) * $this->price, 2),
            'reviews' => $this->reviews->count() == 0 ? 'No Rating Yet' : round(($this->reviews->sum('star')/ $this->reviews->count())),
            'href' => [
                'reviews' => route('reviews.index', $this->id)
            ]
        ];
    }
}
