<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'source', 'source_id', 'ref_order_id', 'customer_id', 'ship_to_address_id', 'bill_to_address_id',
        'payment_id', 'order_store_assignment_id', 'line_items', 'source_order_id', 'source_order_no',
        'created_by', 'updated_by', 'financial_status', 'fulfillment_status', 'total_amount',
        'total_subtotal_amount', 'total_quantity', 'total_tax_amount', 'total_discount_amount',
        'ordered_quantity', 'fulfilled_quantity', 'subsidiary_no', 'order_notes', 'remarks',
        'instructions', 'delivery_notes', 'option1', 'option2', 'option3', 'status', 'order_type',
        'order_created_at', 'order_updated_at'
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function refOrder()
    {
        return $this->belongsTo(Order::class, 'ref_order_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function orderStoreAssignment()
    {
        return $this->belongsTo(OrderStoreAssignment::class);
    }

    public function orderLineItems()
    {
        return $this->hasMany(OrderLineItem::class);
    }

    public function fulfillments()
    {
        return $this->hasMany(Fulfillment::class);
    }
}
