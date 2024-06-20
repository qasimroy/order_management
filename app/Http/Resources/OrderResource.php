<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'source_id' => $this->source_id,
            'ref_order_id' => $this->ref_order_id,
            'customer_id' => $this->customer_id,
            'ship_to_address_id' => $this->ship_to_address_id,
            'bill_to_address_id' => $this->bill_to_address_id,
            'payment_id' => $this->payment_id,
            'order_store_assignment_id' => $this->order_store_assignment_id,
            'line_items' => $this->line_items,
            'source_order_id' => $this->source_order_id,
            'source_order_no' => $this->source_order_no,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'financial_status' => $this->financial_status,
            'fulfillment_status' => $this->fulfillment_status,
            'total_amount' => $this->total_amount,
            'total_subtotal_amount' => $this->total_subtotal_amount,
            'total_quantity' => $this->total_quantity,
            'total_tax_amount' => $this->total_tax_amount,
            'total_discount_amount' => $this->total_discount_amount,
            'ordered_quantity' => $this->ordered_quantity,
            'fulfilled_quantity' => $this->fulfilled_quantity,
            'subsidiary_no' => $this->subsidiary_no,
            'order_notes' => $this->order_notes,
            'remarks' => $this->remarks,
            'instructions' => $this->instructions,
            'delivery_notes' => $this->delivery_notes,
            'option1' => $this->option1,
            'option2' => $this->option2,
            'option3' => $this->option3,
            'status' => $this->status,
            'order_type' => $this->order_type,
            'order_created_at' => $this->order_created_at,
            'order_updated_at' => $this->order_updated_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'bill_to_address' => new BillToAddressResource($this->whenLoaded('billToAddress')),
            'ship_to_address' => new ShipToAddressResource($this->whenLoaded('shipToAddress')),
            'payment' => new PaymentResource($this->whenLoaded('payment')),
            'order_line_items' => OrderLineItemResource::collection($this->whenLoaded('orderLineItems')),
            'order_store_assignment' => OrderStoreAssignmentResource::collection($this->whenLoaded('orderStoreAssignment')),
        ];
    }
}
