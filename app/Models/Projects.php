<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Projects extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [
        'id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function stack() {
        return $this->belongsToMany(Stack::class, 'project_stack');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
