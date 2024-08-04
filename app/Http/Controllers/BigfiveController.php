<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\BigFive;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;

class BigfiveController extends Controller
{
    public function index()
    {
        return Inertia::render('Member/Tests/Index');
    }

    

public function create()
{
    $validationRules = [];
    $validationMessages = [];
   //バリデーション設定 
    for ($i = 1; $i <= 50; $i++) {
        $validationRules['answers'.$i] = 'required';
        $validationMessages['answers'.$i.'.required'] = '質問'.$i.'に回答してください。';
    }

    return Inertia::render('Member/Tests/Create', [
        'validationRules' => $validationRules,
        'validationMessages' => $validationMessages,
    ]);
}

    public function store(Request $request)
    {
        $member_id = Auth::id();
        $answers = $request->input('answers', []); 
        
        $averagesArray = [];

        //配列に解答代入
        for ($i = 1; $i <= 50; $i++) {
            $key = 'answers' . $i;
            if (isset($answers[$key])) {
                $averagesArray[] = $answers[$key];
            } else {
                // キーが存在しない場合のエラーハンドリング
                return back()->withErrors(["質問 {$i} の回答が見つかりません。"]);
            }
        }

        // 配列$averagesArrayを１０個ずつのグループに分割
        $groupedAnswers = collect($averagesArray)->chunk(10);

        // 配列内の数値を合計
        // 10で除算し、平均値を取得
        $averagesArray = $groupedAnswers->map(function ($group) {
            $total = array_sum(array_map('intval', $group->values()->all())); 
            $count = count($group); 
            return $total / $count; 
        })->toArray();

        //二回目の診断は、値が更新されるように
            $bigfive= BigFive::updateOrCreate(
                ['member_id'=>$member_id,
                
                'openness' => $averagesArray[0],
                'agreeableness' => $averagesArray[1],
                'extraversion' => $averagesArray[2],
                'conscientiousness' => $averagesArray[3],
                'neuroticism' => $averagesArray[4],
                ]);
        //maybe-later: ロジックが長いので別のファイルに関数としておく


        return to_route('member.tests.show', ['bigFive' => $bigfive->id])
        ->with([
            'message' => 'こちらが結果です。',
            'status' => 'success'
        ]);
        }

    public function show(Request $request, $bigfiveId = null){

        $member_id = Auth::id();
        if ($bigfiveId) {
            $bigfive = BigFive::where('member_id', $member_id)->findOrFail($bigfiveId);
        } else {
            $bigfive = BigFive::where('member_id', $member_id)->latest()->first();
        }
        if (!$bigfive) {
            return to_route('member.tests.create')
                ->with([
                    'message' => 'まだテスト結果がありません。テストを受けてください。',
                    'status' => 'info'
                ]);
        }
    
        return Inertia::render('Member/Tests/Show', [
            'bigfive' => $bigfive,
            'message' => session('message'),
            'status' => session('status')
        ]);
    }
}
