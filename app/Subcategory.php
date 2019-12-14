<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public static function boot() {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = Str::slug($model->name, '-');
        });
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
    
    public function getRouteKeyName() {
        return 'slug';
    }
}
