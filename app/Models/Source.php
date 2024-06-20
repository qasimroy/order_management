<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id', 'name', 'api_key', 'api_key_password', 'auth_token', 
        'employees', 'status', 'created_by', 'updated_by'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
