<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id', 'name', 'created_by', 'updated_by'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
