<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLineItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_line_item_id', 'order_id', 'order_no', 'description1', 
        'description2', 'description3', 'description4', 'discount', 'org_price',
        'price', 'quantity', 'sku', 'size', 'season', 'color', 
        'collection', 'category', 'item_type', 'taxable', 'tax', 
        'tax_perc', 'sid', 'store_no', 'subsidiary_no', 'dimensions', 
        'created_by', 'updated_by'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'fulfillment_line_items');
    }
}
