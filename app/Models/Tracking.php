<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'fulfillment_id',
        'source_fulfillment_id',
        'order_id',
        'order_no',
        'carrier_id',
        'carrier_name',
        'tracking_no',
        'tracking_link',
        'created_by',
        'updated_by',
    ];

    public function fulfillment()
    {
        return $this->belongsTo(Fulfillment::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function carrier()
    {
        return $this->belongsTo(ShippingCompany::class, 'carrier_id');
    }
}
