<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id', 'name', 'created_by', 'updated_by'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function groupUsers()
    {
        return $this->hasMany(GroupUser::class);
    }
}
