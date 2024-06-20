<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'location', 'contact_no', 'employees', 'type', 'note', 
        'info1', 'info2', 'info3', 'created_by', 'updated_by'
    ];

    public function sources()
    {
        return $this->hasMany(Source::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
