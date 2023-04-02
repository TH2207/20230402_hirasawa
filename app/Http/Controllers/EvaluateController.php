<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\Evaluate;
use App\Http\Requests\EvaluateRequest;

class EvaluateController extends Controller
{
    public function evaluate(Request $request)
    {
        $user_id = session()->get('id');
        if (empty($user_id)) {
            $user_id = 0;
        }

        if ($request->isMethod("post")) {
            $reserve = Reserve::find($request->id);
            $reserve_at_date = $reserve->reserve_at->format('Y-m-d');
            $reserve_at_time = $reserve->reserve_at->format('H:i');
            session()->put('reserve', $reserve);
            session()->put('reserve_at_date', $reserve_at_date);
            session()->put('reserve_at_time', $reserve_at_time);
        } else {
            $reserve = session()->get('reserve');
            $reserve_at_date = session()->get('reserve_at_date');
            $reserve_at_time = session()->get('reserve_at_time');
        }

        $params = [
            'user_id' => $user_id,
            'reserve' => $reserve,
            'reserve_at_date' => $reserve_at_date,
            'reserve_at_time' => $reserve_at_time,
        ];
        return view('evaluate', $params);
    }

    public function score(EvaluateRequest $request)
    {
        Evaluate::create([
            'reserve_id' => $request->reserve_id,
            'evaluate_comment' => $request->evaluate_comment,
            'evaluate_point' => $request->evaluate_point,
        ]);
        return redirect()->route('evaluate.finish');
    }

    public function finish()
    {
        $user_id = session()->get('id');
        if (empty($user_id)) {
            $user_id = 0;
        }

        $params = [
            'user_id' => $user_id,
        ];
        return view('finish', $params);
    }
}
