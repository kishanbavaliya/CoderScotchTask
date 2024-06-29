<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'joining_date',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
