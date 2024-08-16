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

    public function getInviteMembers(Request $request){
        $admin = $request->user();

        $members = Member::with(['company'])
        ->whereHas('invite',function($query) use ($admin) {
            $query->where('admin_id', $admin->id);
        })->get()
        ->map(function ($member){
            return [
                'id' => $member->id,
                'name' =>$member->name,
                // 値がない場合null値を返すnull合体演算子
                'companyName' => $member->company ? $member->company->companyName : null,
                'departmentName' => $member->company ? $member->company->departmentName : null,
            ];
        });

        return Inertia::render('Admin/Home/MembersInfo',[
            'members'=>$members
        ]);
    }

    public function showBigFive($memberId){

        $member = member::findOrFail($memberId);

        // 取得したmemberのbigFiveより最初の１を取得する
        $bigFive = $member->bigfive()->latest()->first();

        $chronotype = $member->Chronotype()->first();

        $style = $member->Style()->first();

        if(!$bigFive){
            return back()->with('message','結果がありません');
        }

        return Inertia::render('Admin/Home/ShowBigFive',[
            'member' => $member,
            'bigFive' => $bigFive,
            'Chronotype' => $chronotype,
            'Style' => $style
        ]);
    } 

}
