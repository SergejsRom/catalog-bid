<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_id',
        'user_id',
        'amount',
        'comment',
        'start_date',
        'estimated_date',
    ];

    public function issues()
    {
        return $this->belongsToMany(Issue::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
