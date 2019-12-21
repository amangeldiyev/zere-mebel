<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function boot() {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = Str::slug($model->title, '-');
        });

        self::updating(function ($model) {
            $model->slug = Str::slug($model->title, '-');
        });
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function attributes() {
        return $this->hasMany(Attribute::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
