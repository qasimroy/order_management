<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStoreAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'store_id', 'assigned_date', 'prev_store_id', 
        'prev_assigned_date', 'created_by', 'updated_by'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function reassignedStore()
    {
        return $this->belongsTo(Store::class, 'reassigned_store_id');
    }
}
