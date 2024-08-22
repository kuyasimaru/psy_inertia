<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Chronotype;
use Illuminate\Support\Facades\Auth;

class ChronotypeController extends Controller
{
    public function chronotypecreate(){
        $validationRules = [];
        $validationMessages = [];
        //バリデーション設定 
        for ($i = 1; $i <= 20; $i++) {
            $validationRules['answersB'.$i] = 'required';
            $validationMessages['answersB'.$i.'.required'] = '質問'.$i.'に回答してください。';
        }

        return Inertia::render('Member/Tests/ChronoTypeCreate', [
            'validationRules' => $validationRules,
            'validationMessages' => $validationMessages,
        ]);
    }

    public function chronotypestore(Request $request){
        $member_id = Auth::id();
        $answersB = $request->input('answersB', []); 

        $sumArray = [];

        //配列に解答代入
        for ($i = 1; $i <= 20; $i++) {
            $key = 'answersB' . $i; //answersBと$iを連結し、$keyに代入
            if (isset($answersB[$key])) {
                $sumArray[] = $answersB[$key];
            } else {
                // キーが存在しない場合のエラーハント
                return back()->withErrors(["質問 {$i} の回答が見つかりません。"]);
            }
        }

        // 結果を計算
        $resultSum = array_sum($sumArray);

        $chronotype = Chronotype::updateOrCreate(
            ['member_id' =>$member_id],
            ['result'=>$resultSum]
    );

        return to_route('member.tests.chronotypeshow', ['chronotype' => $chronotype->id])
        ->with([
            'message' => 'こちらが結果です。',
            'status' => 'success'
        ]);
    }

    public function chronotypeshow(Request $request, $chronotypeId = null)
    {
        $member_id = Auth::id();
        if ($chronotypeId) {
            $chronotype = Chronotype::where('member_id', $member_id)->findOrFail($chronotypeId);
        } else {
            $chronotype = Chronotype::where('member_id', $member_id)->latest()->first();
        }
        if (!$chronotype) {
            return to_route('member.tests.chronotypecreate')
                ->with([
                    'message' => 'まだテスト結果がありません。テストを受けてください。',
                    'status' => 'info'
                ]);
        }

        return Inertia::render('Member/Tests/ChronoTypeShow', [
            'result' => $chronotype,
        ]);
    }
    
}
