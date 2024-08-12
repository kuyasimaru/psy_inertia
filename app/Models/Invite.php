<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\Member;
use App\Models\Company;

class Invite extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'member_id',
        'admin_id',
        'token'
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function company()
    {
        //　CompanyのAdminIDを明示的に指定＝＞foreign_key  local_key
        return $this->hasOne(Company::class, 'admin_id', 'admin_id');
    }
}
