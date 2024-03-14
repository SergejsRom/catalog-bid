<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'expected_term',
    ];

    public function bids(): BelongsToMany
    {
        return $this->belongsToMany(Bid::class)->withPivot('name');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
