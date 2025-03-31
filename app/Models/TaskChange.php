<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskChange extends Model
{
    use HasFactory;

    protected $fillable = ['task_id', 'field', 'old_value', 'new_value'];

    public function todo()
    {
        return $this->belongsTo(Todo::class, 'task_id');
    }
}