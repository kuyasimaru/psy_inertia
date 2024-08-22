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

    protected $appends = ['formatted_results'];

public function getFormattedResultsAttribute()
{
    return [
        'openness' => number_format($this->openness, 1),
        'agreeableness' => number_format($this->agreeableness, 1),
        'extraversion' => number_format($this->extraversion, 1),
        'conscientiousness' => number_format($this->conscientiousness, 1),
        'neuroticism' => number_format($this->neuroticism, 1),
    ];
}
}
