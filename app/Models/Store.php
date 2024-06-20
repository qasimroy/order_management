<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id', 'name', 'store_no', 'status', 'created_by', 'updated_by'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function orderStoreAssignments()
    {
        return $this->hasMany(OrderStoreAssignment::class);
    }

    public function fulfillmentLineItems()
    {
        return $this->hasMany(FulfillmentLineItem::class);
    }
}
