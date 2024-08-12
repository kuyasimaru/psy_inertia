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


class AdminInvite extends Controller
{
    public function sendmail(){
        return Inertia::render('Admin/Invite/Send');
    }
    public function sendInvite(Request $request){
        $validate = $request->validate([
            'email'=> 'required|email',
        ]);

        $member = Member::where('email',$validate['email'])->firstOrFail(); //最初の一つのレコードを取得
        $token = Str::random(32);

        $invite = Invite::create([
            'member_id' => $member->id,
            'admin_id' => $request->user()->id,
            'token' => $token,
        ]);

        Mail::to($member->email)->send(new MemberInvitMail($invite));

        return redirect()->back()->with('message', '招待メールを送信しました。');
    }


}
