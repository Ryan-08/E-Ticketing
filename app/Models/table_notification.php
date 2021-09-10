<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tiket;

class table_notification extends Model
{
    use HasFactory;

    protected $table = 'table_notification';

    protected $fillable = [
        'user',
        'no_ticket',
        'ticket_id'
    ];

    public function ticket() {
        return $this->hasMany(Tiket::class);
    }
}
