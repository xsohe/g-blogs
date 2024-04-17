<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use PhpParser\Node\Expr\FuncCall;

class Blog extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [
        'id'
    ];

    protected $with = ['tag', 'user'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['tag'] ?? false, fn($query, $tag) => 
            $query->whereHas('tag', fn($query) => 
                $query->where('name', $tag)
            )
        );
    }

    public function tag() {
        return $this->belongsTo(Tag::class, 'tag_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

