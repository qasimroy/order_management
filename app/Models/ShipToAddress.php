<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipToAddress extends Model
{
    use HasFactory;

    protected $table = 'ship_to_addresses';

    protected $fillable = [
        'customer_id', 'first_name', 'last_name', 'phone', 'email',
        'address1', 'address2', 'city', 'country', 'country_code',
        'zip', 'created_by', 'updated_by'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'ship_to_address_id');
    }
}
