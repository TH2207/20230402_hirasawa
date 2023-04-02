@extends('layouts.default')

@section('css')
<script src="{{ asset('js/common.js') }}" defer></script>
@endsection

@section('content')
@extends('components.header-common')

<div class="common-main">
  <div class="common-sub-wrapper">
    <div class="common-sub-left">
      <form method="post" action="{{ route('reserve.back') }}" class="common-sub-left-ttl">
        @csrf
        <button type="submit" name="action" value="back" class="common-sub-left-return">＜</button>
        <h2 class="common-sub-left-name">{{$reserve->shop->shop_name}}</h2>
      </form>
      <div class="common-sub-left-img">
        @switch($reserve->shop->genre_id)
        @case(1)
        <img src="/storage/sushi.jpg" alt="寿司">
        @break
        @case(2)
        <img src="/storage/yakiniku.jpg" alt="焼肉">
        @break
        @case(3)
        <img src="/storage/izakaya.jpg" alt="居酒屋">
        @break
        @case(4)
        <img src="/storage/italian.jpg" alt="イタリアン">
        @break
        @case(5)
        <img src="/storage/ramen.jpg" alt="ラーメン">
        @break
        @default
        <img src="/storage/ramen.jpg" alt="ラーメン">
        @break
        @endswitch
      </div>
      <div class="common-sub-left-text">
        <p class="common-sub-left-text-sharp">#{{$reserve->shop->region->region}}</p>
        <p class="common-sub-left-text-sharp">#{{$reserve->shop->genre->genre}}</p>
        <p class="common-sub-left-text-comment">{{$reserve->shop->shop_detail}}</p>
      </div>
    </div>
    <div class="common-sub-right">
      <form action="{{ route('evaluate.score', ['reserve_id' => $reserve->id]) }}" method="post" class="" name="">
        @csrf
        <div class="common-sub-right-input">
          <h2 class="common-sub-right-input-name">店舗評価</h2>
          @if (count($errors) > 0)
          <div class="error">
            @error('evaluate_comment')
            <p class="common-text-danger">{{$message}}</p>
            @enderror
          </div>
          @endif
          <div class="common-sub-right-input-table">
            <table id="confirm-tbl" class="confirm-tbl">
              <tr>
                <td>Shop</td>
                <td>{{$reserve->shop->shop_name}}</td>
              </tr>
              <tr>
                <td>Date</td>
                <td>{{$reserve_at_date}}</td>
              </tr>
              <tr>
                <td>Time</td>
                <td>{{$reserve_at_time}}</td>
              </tr>
              <tr>
                <td>Number</td>
                <td>{{$reserve->reserve_person}}</td>
              </tr>
            </table>
          </div>
          <div class="evaluate-input">
            <p class="evaluate-input-text">・評価点</p>
            <select name='evaluate_point' class="evaluate-input-point">
              <option value='1' selected>1点</option>
              @for($i = 2; $i <= 5; $i++) <option value='{{$i}}'>{{$i}}点</option>
                @endfor
            </select>
            <p class="evaluate-input-text">・コメント</p>
            <textarea name="evaluate_comment" class="evaluate-input-comment"></textarea>
          </div>
        </div>
        <button type="submit" name="action" class="common-sub-right-confirm">店舗評価する</button>
      </form>
    </div>
  </div>
</div>
@endsection