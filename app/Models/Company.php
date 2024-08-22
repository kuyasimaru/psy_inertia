<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\Member;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'companyName',
        'departmentName'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function member(){
        return $this->hasOne(Member::class);
    }
}
