<?php

namespace App\Domain\Product\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->name ?? $this->product_name,
            'category' => $this->category->name ?? $this->category_name,
            'price' => $this->present()->priceDetails(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
