<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = [
        'problem',
        'description',
        'image_path',
    ];

    public function user() {
        return $this->hasOne(User::class);
    }
}
