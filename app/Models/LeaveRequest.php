<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'date_from', 'date_to', 'reason'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
