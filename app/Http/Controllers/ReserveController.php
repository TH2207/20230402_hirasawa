<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Region;
use App\Models\Genre;
use App\Models\Reserve;
use App\Models\Favorite;
use App\Models\Evaluate;
use App\Http\Requests\ReserveRequest;

class ReserveController extends Controller
{
    public function show(Request $request)
    {
        $request->session()->put('back_url', $request->getRequestUri());

        $region_id = $request->session()->get('region_id');
        $genre_id = $request->session()->get('genre_id');
        $shop_name = $request->session()->get('shop_name');

        $shops = Shop::doSearch($region_id, $genre_id, $shop_name);
        $regions = Region::all();
        $genres = Genre::all();
        $user_id = session()->get('id');

        $favorites_shopId[] = null;
        if (!empty($user_id)) {
            $favorites = Favorite::where('user_id', $user_id)->get();
            if (!$favorites->isEmpty()) {
                foreach ($favorites as $favorite) {
                    $favorites_shopId[] = $favorite->shop_id;
                }
            }
        } else {
            $user_id = 0;
            session()->forget('email');
            session()->forget('password');
        }

        $params = [
            'user_id' => $user_id,
            'region_id' => $region_id,
            'genre_id' => $genre_id,
            'shop_name' => $shop_name,
            'shops' => $shops,
            'regions' => $regions,
            'genres' => $genres,
            'favorites_shopId' => $favorites_shopId
        ];
        return view('index', $params);
    }

    public function search(Request $request)
    {
        $region_id = $request->region_id;
        $genre_id = $request->genre_id;
        $shop_name = $request->shop_name;

        session()->put('region_id', $region_id);
        session()->put('genre_id', $genre_id);
        session()->put('shop_name', $shop_name);
        return redirect()->route('reserve.show');
    }

    public function menu()
    {
        session()->forget('region_id');
        session()->forget('genre_id');
        session()->forget('shop_name');
        return redirect()->route('reserve.show');
    }

    public function detail($shop_id = 1)
    {
        $user_id = session()->get('id');
        if(empty($user_id)) {
            $user_id = 0;
        }

        $shop = Shop::find($shop_id);
        $params = [
            'user_id' => $user_id,
            'shop' => $shop,
        ];
        return view('detail', $params);
    }

    public function reserve(ReserveRequest $request)
    {
        $user_id = session()->get('id');
        $shop_id = $request->shop_id;
        $reserve_at = $request->reserve_at_date . ' ' . $request->reserve_at_time;
        $reserve_person = $request->reserve_person;

        $params = [
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'reserve_at' => $reserve_at,
            'reserve_person' => $reserve_person,
        ];

        Reserve::create($params);
        return redirect()->route('reserve.done');
    }

    public function done()
    {
        $user_id = session()->get('id');
        if (empty($user_id)) {
            $user_id = 0;
        }

        $params = [
            'user_id' => $user_id,
        ];
        return view('done', $params);
    }

    public function mypage(Request $request)
    {
        $request->session()->put('back_url', $request->getRequestUri());

        $user_id = session()->get('id');
        $user_name = session()->get('name');
        if (empty($user_id || $user_name)) {
            $user_id = 0;
            $user_name = '';
        }

        $reserves = Reserve::where('user_id', $user_id)->get();
        $favorites = Favorite::where('user_id', $user_id)->get();
        $evaluates = Evaluate::all();
        $evaluates_reserveId[] = null;
        if (!$evaluates->isEmpty()) {
            foreach ($evaluates as $evaluate) {
                $evaluates_reserveId[] = $evaluate->reserve_id;
            }
        }

        $params = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'reserves' => $reserves,
            'favorites' => $favorites,
            'evaluates_reserveId' => $evaluates_reserveId,
        ];
        return view('mypage', $params);
    }

    public function mypage_reserve_cancel(Request $request)
    {
        Reserve::find($request->id)->delete();
        return redirect()->route('reserve.mypage');
    }

    public function reschedule(Request $request)
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
        }
        else{
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
        return view('change', $params);
    }

    public function update(ReserveRequest $request)
    {
        $reserve_at = $request->reserve_at_date . ' ' . $request->reserve_at_time;
        $reserve_person = $request->reserve_person;

        $params = [
            'reserve_at' => $reserve_at,
            'reserve_person' => $reserve_person,
        ];

        Reserve::where('id', $request->reserve_id)->update($params);
        return redirect()->route('reserve.change');
    }

    public function change()
    {
        $user_id = session()->get('id');
        if (empty($user_id)) {
            $user_id = 0;
        }

        $params = [
            'user_id' => $user_id,
        ];
        return view('update', $params);
    }

    public function detail_move(Request $request)
    {
        $shop_id = $request->shop_id;
        return redirect()->route('reserve.detail', $shop_id);
    }

    public function back(Request $request)
    {
        $back_url = $request->session()->get('back_url');
        if($back_url) {
            return redirect($back_url);
        }
        else {
            return redirect()->route('reserve.show');
        }
    }
}
