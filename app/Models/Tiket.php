<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = [
        'no_ticket',
        'problem',
        'description',
        'image_path',
        'ticket_status_id',
        'problem_status_id',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }       
}
