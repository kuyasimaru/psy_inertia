<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class BigFive extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'openness',
        'agreeableness',
        'extraversion',
        'conscientiousness',
        'neuroticism',
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }
}
