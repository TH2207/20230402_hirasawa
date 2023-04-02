<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function mypage_favorite_remove(Request $request)
    {
        Favorite::find($request->id)->delete();
        return redirect()->route('reserve.mypage');
    }

    public function index_favorite_remove(Request $request)
    {
        $user_id = session()->get('id');
        if (empty($user_id)) {
            $user_id = 0;
        }
        Favorite::where('user_id', $user_id)->where('shop_id', $request->shop_id)->delete();
        return redirect()->route('reserve.show');
    }

    public function index_favorite_add(Request $request)
    {
        $user_id = session()->get('id');
        if (empty($user_id)) {
            $user_id = 0;
        }
        Favorite::create([
            'user_id' => $user_id,
            'shop_id' => $request->shop_id
        ]);
        return redirect()->route('reserve.show');
    }
}
