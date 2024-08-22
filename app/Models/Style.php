<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class Style extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'result',
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }
}
