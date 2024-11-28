<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function scopeActive(Builder $query) {
        $query->where('status',1);
    }
}
