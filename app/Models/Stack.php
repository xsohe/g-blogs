<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stack extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function project() {
        return $this->belongsToMany(Projects::class, 'prject_stack');
    }
}
