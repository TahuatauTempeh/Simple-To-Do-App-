<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['category_id', 'task_name', 'description', 'priority', 'due_date'])]
class Task extends Model
{
    public function casts(): array{
        return[
            'is_done' => 'boolean',
            'due_date' => 'date',
            'completed_at' => 'datetime'
        ];
    }

    public function user(): BelongsTo{
        return $this->BelongsTo(User::class);
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category:: class);
    }
}
