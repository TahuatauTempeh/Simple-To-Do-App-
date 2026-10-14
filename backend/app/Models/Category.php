<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['category_name', 'colour'])]
class Category extends Model
{
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function tasks(): HasMany{
        return $this->hasMany(Task::class);
    }
}
