<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\BigFive;
use Illuminate\Support\Facades\Auth;

class BFController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
            return Inertia::render('Member/Tests/Index');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $validationRules = [];
    $validationMessages = [];
    
    for ($i = 1; $i <= 50; $i++) {
        $validationRules['answers'.$i] = 'required';
        $validationMessages['answers'.$i.'.required'] = '質問'.$i.'に回答してください。';
    }

    return Inertia::render('Member/Tests/Create', [
        'validationRules' => $validationRules,
        'validationMessages' => $validationMessages,
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $member_id = Auth::id(); 
        // tests/create.vueより解答情報の取得
        // ＄answersは全部で５０問
        $answers = $request->all(); 
        
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
    
        $updateTest =BigFive::where('member_id',$member_id)->first();

        //二回目の診断は、値が更新されるように
        if($updateTest){
            $updateTest->update([
                'openness' => $averagesArray[0],
                'agreeableness' => $averagesArray[1],
                'extraversion' => $averagesArray[2],
                'conscientiousness' => $averagesArray[3],
                'neuroticism' => $averagesArray[4],
                'test_id' => $member_id
            ]);
        $tests = $updateTest;

        } else {

        $tests = BigFive::create([
            'member_id' => $member_id,
            'openness' => $averagesArray[0],
            'agreeableness' => $averagesArray[1],
            'extraversion' => $averagesArray[2],
            'conscientiousness' => $averagesArray[3],
            'neuroticism' => $averagesArray[4],
        ]);
        }    
        //maybe-later: ロジックが長いので別のファイルに関数としておく

        dd($averagesArray);

        return to_route('member.tests.show', $tests->id)
        ->with([
            'message' => 'こちらっが結果です。',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Inertia::render('Member/Tests/Show'
        ,[
            'bigfive' => $id
        ]
    );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
