<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\mail\MemberInvitMail;
use App\Models\Member;
use App\Models\Company;
use App\Models\Invite;
use Illuminate\Support\Str;
use Inertia\Inertia;

class FormInviteController extends Controller
{
    public function showCompanyForm($token)
    {
        //tokenが一致する招待したmember取得
        $invite = Invite::where('token', $token)->firstOrFail();
        $member = $invite->member;

        return Inertia::render('Member/Company/FormCreate', [
            'member' => $member,
            'token' => $token,
        ]);
    }

    public function storeCompanyInfo(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:50',
            'department_name' => 'required|string|max:50',
            'token' => 'required|string|exists:invites,token',
        ]);

        //tokenが一致する招待したmember取得
        $invite = Invite::where('token', $validated['token'])->firstOrFail();
        $member = $invite->member;

        $company = Company::create([
            'companyName' => $validated['company_name'],
            'departmentName' => $validated['department_name'],
            'admin_id' => $invite->admin_id,
        ]);

        //Companiesテーブルとの関連付け
        $member->company_id = $company->id;
        $member->save();

        //トークン無効化のため削除
        $invite->delete();

        return to_route('member.index')
        ->with('message', '会社情報が登録されました。');
    }
}
