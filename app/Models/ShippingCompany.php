<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'name',
        'api_key',
        'api_key_password',
        'api_auth_token',
        'created_by',
        'updated_by',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
