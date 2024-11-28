<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function scopeActive(Builder $query) {
        $query->where('status',1);
    }

    public function users() {
        return $this->belongsToMany(User::class, "course_users");
    }
}
