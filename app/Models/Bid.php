<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'comment',
        'start_date',
        'estimated_date',
    ];

    public function issues()
    {
        return $this->belongsToMany(Issue::class)->withPivot('bid_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
