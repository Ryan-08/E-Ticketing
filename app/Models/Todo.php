<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Todo extends Model
{
    use HasFactory;
    use LogsActivity;

    // Customize log name
    protected static $logName = 'todo';
    protected $fillable = ['title', 'description', 'user_id'];
    
    // Only defined attribute will store in log while any change
    protected static $logAttributes = ['description'];
    // Customize log description
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }   
}
