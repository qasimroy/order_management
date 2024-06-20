<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fulfillment extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_fulfillment_id', 'order_id', 'order_no', 'ship_to_id', 'bill_to_id', 
        'package_weight', 'package_size', 'package_type', 'dimensions', 'created_by', 
        'updated_by', 'status', 'created_at', 'updated_at'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function shipToAddress()
    {
        return $this->belongsTo(ShipToAddress::class, 'ship_to_id');
    }

    public function billToAddress()
    {
        return $this->belongsTo(BillToAddress::class, 'bill_to_id');
    }

    public function fulfillmentLineItems()
    {
        return $this->hasMany(FulfillmentLineItem::class);
    }

    public function trackings()
    {
        return $this->hasMany(Tracking::class);
    }
}
