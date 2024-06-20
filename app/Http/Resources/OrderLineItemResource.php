<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderLineItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'source_line_item_id' => $this->source_line_item_id,
            'order_id' => $this->order_id,
            'order_no' => $this->order_no,
            'description1' => $this->description1,
            'description2' => $this->description2,
            'description3' => $this->description3,
            'description4' => $this->description4,
            'discount' => $this->discount,
            'org_price' => $this->org_price,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'sku' => $this->sku,
            'size' => $this->size,
            'season' => $this->season,
            'color' => $this->color,
            'collection' => $this->collection,
            'category' => $this->category,
            'item_type' => $this->item_type,
            'taxable' => $this->taxable,
            'tax' => $this->tax,
            'tax_perc' => $this->tax_perc,
            'sid' => $this->sid,
            'store_no' => $this->store_no,
            'subsidiary_no' => $this->subsidiary_no,
            'dimensions' => $this->dimensions,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
