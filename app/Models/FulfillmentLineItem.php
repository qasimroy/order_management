<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FulfillmentLineItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_fulfillment_line_item_id',
        'line_item_sys_id',
        'order_line_item_id',
        'fulfillment_id',
        'tracking_id',
        'current_quantity',
        'fulfillable_quantity',
        'fulfillment_store_id',
        'fulfillment_status',
        'description1',
        'description2',
        'description3',
        'description4',
        'price',
        'quantity',
        'sku',
        'size',
        'season',
        'color',
        'collection',
        'category',
        'item_type',
        'taxable',
        'total_discount',
        'vendor',
        'tax_rate',
        'tax_price',
        'created_by',
        'updated_by',
    ];

    public function orderLineItem()
    {
        return $this->belongsTo(OrderLineItem::class);
    }

    public function fulfillment()
    {
        return $this->belongsTo(Fulfillment::class);
    }

    public function fulfillmentStore()
    {
        return $this->belongsTo(Store::class, 'fulfillment_store_id');
    }
}
