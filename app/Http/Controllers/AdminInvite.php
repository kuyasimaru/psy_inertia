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
        $token = Str::random(32);//トークン生成

        $invite = Invite::create([
            'member_id' => $member->id,
            'admin_id' => $request->user()->id,
            'token' => $token,
        ]);
        //メール送信
        Mail::to($member->email)->send(new MemberInvitMail($invite));

        return to_route('admin.home.members-info')
        ->with('message', '招待メールを送信しました。');
    }

    public function getInviteMembers(Request $request){
        //
        $admin = $request->user();

        $members = Member::with('company')
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

    public function edit($id){
        $member = Member::findOrFail($id);
        return Inertia::render('Admin/Home/Edit',[
            'member' =>$member,
        ]);
    }

    public function update(Request $request ,$id){
        $member = Member::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'companyName' => 'required|string|max:50',
            'departmentName' => 'required|string|max:50',
        ]);

        $member->update(['name' => $validated['name']]);

        // 会社情報を更新
        $company = $member->company;
        if ($company) {
            $company->update([
                'companyName' => $validated['companyName'],
                'departmentName' => $validated['departmentName'],
            ]);
        }

        return to_route('admin.home.members-info')
        ->with('message','社員情報を更新しました、');
    }

    public function destroy($id){
        $member = Member::findOrFail($id);
        $member->delete();

        return to_route('admin.home.members-info')
        ->with('message','社員情報を更新しました、');
    }
}
