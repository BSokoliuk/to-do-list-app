<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'description', 'priority', 'status', 'user_id', 'end_date', 'notified'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function changes()
    {
        return $this->hasMany(TaskChange::class, 'task_id');
    }
}