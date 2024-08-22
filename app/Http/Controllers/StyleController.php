<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Style;
use Illuminate\Support\Facades\Auth;

class StyleController extends Controller
{
    public function stylecreate(){
        $validationRules = [];
        $validationMessages = [];
        //バリデーション設定 
        for ($i = 1; $i <= 19; $i++) {
            $validationRules['answersC'.$i] = 'required';
            $validationMessages['answersC'.$i.'.required'] = '質問'.$i.'に回答してください。';
        }

        return Inertia::render('Member/Tests/StyleCreate', [
            'validationRules' => $validationRules,
            'validationMessages' => $validationMessages,
        ]);
    }

    public function stylestore(Request $request){
        $member_id = Auth::id();
        $answersC = $request->input('answersC', []); 

        $sumArray = [];

        //配列に解答代入
        for ($i = 1; $i <= 19; $i++) {
            $key = 'answersC' . $i; //answersBと$iを連結し、$keyに代入
            if (isset($answersC[$key])) {
                $sumArray[] = $answersC[$key];
            } else {
                // キーが存在しない場合のエラーハント
                return back()->withErrors(["質問 {$i} の回答が見つかりません。"]);
            }
        }

        // 結果を計算
        $resultSum = array_sum($sumArray);

        $style = Style::updateOrCreate(
            ['member_id' =>$member_id],
            ['result'=>$resultSum]
    );

        return to_route('member.tests.styleshow', ['style' => $style->id])
        ->with([
            'message' => 'こちらが結果です。',
            'status' => 'success'
        ]);
    }

    public function styleshow(Request $request, $styleId = null){

        $member_id = Auth::id();
        if ($styleId) {
            $style = Style::where('member_id', $member_id)->findOrFail($styleId);
        } else {
            $style = Style::where('member_id', $member_id)->latest()->first();
        }
        if (!$style) {
            return to_route('member.tests.stylecreate')
                ->with([
                    'message' => 'まだテスト結果がありません。テストを受けてください。',
                    'status' => 'info'
                ]);
        }
    
        return Inertia::render('Member/Tests/StyleShow', [
            'result' => $style,
        ]);
    } 
}
