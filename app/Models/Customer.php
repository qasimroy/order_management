<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_id', 'business_id', 'first_name', 'last_name', 'phone', 'email', 'contact_no', 
        'address1', 'address2', 'city', 'country', 'country_code', 'zip', 'taxable', 'gender', 
        'dob', 'annivarsary_date', 'info1', 'info2', 'info3', 'info4', 'created_by', 'updated_by'
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
