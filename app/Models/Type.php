<?php

namespace App\Models;

use App\Models\Type as ModelsType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model // level 2 of category relations
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'image',
        'category_id',
        'active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Category::class);
    }

    public function subtypes()
    {
        return $this->hasMany(SubType::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
