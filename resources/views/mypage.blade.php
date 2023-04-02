@extends('layouts.default')

@section('css')
<script src="{{ asset('js/common.js') }}" defer></script>
<script src="{{ asset('js/mypage.js') }}" defer></script>
@endsection

@section('content')
@extends('components.header-common')

<div class="common-main">
  <h2 class="mypage-name">{{$user_name}}さん</h2>
  <div class="mypage-wrapper">
    <div class="mypage-reserve">
      <h3 class="mypage-ttl">予約状況</h3>
      @if(count($reserves))
      @foreach($reserves as $reserve)
      <div class="mypage-reserve-detail">
        <div class="mypage-reserve-change">
          <form method="post" action="{{ route('reserve.reschedule') }}" class="mypage-reserve-change-form-change">
            @csrf
            <button type="submit" name="id" value="{{$reserve->id}}" class="mypage-reserve-change-btn"><i class="fa-solid fa-clock"></i></button>
          </form>
          <p class="mypage-reserve-change-text">予約{{$loop->iteration}}</p>
          <form method="post" action="{{ route('reserve.mypage_cancel') }}" class="mypage-reserve-change-form-delete">
            @csrf
            <button type="submit" name="id" value="{{$reserve->id}}" class="mypage-reserve-delete-btn"><i class="fa-solid fa-circle-xmark"></i></button>
          </form>
        </div>
        <table id="confirm-tbl" class="confirm-tbl">
          <tr>
            <td>Shop</td>
            <td>{{$reserve->shop->shop_name}}</td>
          </tr>
          <tr>
            <td>Date</td>
            <td>{{$reserve->reserve_at->format('Y-m-d')}}</td>
          </tr>
          <tr>
            <td>Time</td>
            <td>{{$reserve->reserve_at->format('H:i')}}</td>
          </tr>
          <tr>
            <td>Number</td>
            <td>{{$reserve->reserve_person}}人</td>
          </tr>
        </table>
        <form method="post" action="{{ route('evaluate.move') }}" class="">
          @csrf
          @if(array_search($reserve->id, $evaluates_reserveId) === false)
          <button class="mypage-evaluate-btn" type="submit" name="id" value="{{$reserve->id}}">評価する</button>
          @else
          <button class="mypage-evaluate-btn btn-hidden" type="submit" name="id" value="{{$reserve->id}}" disabled>評価済み</button>
          @endempty
        </form>
      </div>
      @endforeach
      @else
      <p>予約はありません。</p>
      @endif
    </div>
    <div class="mypage-favorite">
      <h3 class="mypage-ttl">お気に入り店舗</h3>
      <div class="mypage-favorite-list">
        @if(count($favorites))
        @foreach($favorites as $favorite)
        <div class="mypage-favorite-item">
          @switch($favorite->shop->genre_id)
          @case(1)
          <img src="/storage/sushi.jpg" class="shop-item-img" alt="寿司">
          @break
          @case(2)
          <img src="/storage/yakiniku.jpg" class="shop-item-img" alt="焼肉">
          @break
          @case(3)
          <img src="/storage/izakaya.jpg" class="shop-item-img" alt="居酒屋">
          @break
          @case(4)
          <img src="/storage/italian.jpg" class="shop-item-img" alt="イタリアン">
          @break
          @case(5)
          <img src="/storage/ramen.jpg" class="shop-item-img" alt="ラーメン">
          @break
          @default
          <img src="/storage/ramen.jpg" class="shop-item-img" alt="ラーメン">
          @break
          @endswitch
          <div class="shop-item-detail">
            <h2 class="shop-item-detail-ttl">{{$favorite->shop->shop_name}}</h2>
            <p class="shop-item-detail-sharp">#{{$favorite->shop->region->region}}</p>
            <p class="shop-item-detail-sharp">#{{$favorite->shop->genre->genre}}</p>
            <div class="shop-item-box">
              <form method="post" action="{{ route('reserve.detail_move') }}" class="shop-item-box-detail">
                @csrf
                <button class="shop-item-box-btn" type="submit" name="shop_id" value="{{$favorite->shop_id}}">詳しくみる</button>
              </form>
              <form method="post" action="{{ route('favorite.mypage_remove') }}" class="shop-item-box-favorite">
                @csrf
                <button type="submit" name="id" value="{{$favorite->id}}"><i class="fa-solid fa-heart common-heart-red"></i></button>
              </form>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <p>お気に入り店舗はありません。</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection