<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this -> id,
            "name" => $this -> name,
            "price" => $this -> price,
            "created_at" => Carbon::parse($this -> created_at) -> format("Y-m-d H:i:s"),
            "updated_at" => Carbon::parse($this -> updated_at) -> format("Y-m-d H:i:s"),
            "orders" => $this -> whenLoaded('orders'),
            "order_count" => $this -> whenCounted('orders')
        ];
    }
}
