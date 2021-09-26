<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'cost_price' => $this->cost_price,
            'stock' => $this->stock,
            'slug' => $this->slug,
            'thumbnail' => $this->thumbnail,
            'weight' => $this->weight,
            'area' => $this->area,
            'created_by' => $this->user
        ];
    }
}
