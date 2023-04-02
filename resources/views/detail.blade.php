@extends('layouts.default')

@section('css')
<script src="{{ asset('js/common.js') }}" defer></script>
<script src="{{ asset('js/detail.js') }}" defer></script>
@endsection

@section('content')
@extends('components.header-common')

<div class="common-main">
  <div class="common-sub-wrapper">
    <div class="common-sub-left">
      <form method="post" action="{{ route('reserve.back') }}" class="common-sub-left-ttl">
        @csrf
        <button type="submit" name="action" value="back" class="common-sub-left-return">＜</button>
        <h2 class="common-sub-left-name">{{$shop->shop_name}}</h2>
      </form>
      <div class="common-sub-left-img">
        @switch($shop->genre_id)
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
        <p class="common-sub-left-text-sharp">#{{$shop->region->region}}</p>
        <p class="common-sub-left-text-sharp">#{{$shop->genre->genre}}</p>
        <p class="common-sub-left-text-comment">{{$shop->shop_detail}}</p>
      </div>
    </div>
    <div class="common-sub-right">
      <form action="{{ route('reserve.add', ['shop_id' => $shop->id]) }}" method="post" class="" name="">
        @csrf
        <div class="common-sub-right-input">
          <h2 class="common-sub-right-input-name">予約</h2>
          @if (count($errors) > 0)
          <div class="error">
            @error('reserve_at_date')
            <p class="common-text-danger">{{$message}}</p>
            @enderror
          </div>
          @endif
          <input type="date" name="reserve_at_date" value="{{date('Y-m-d')}}" class="common-sub-right-inputbox calender" id="date">
          <input type="time" name="reserve_at_time" id="time" class="common-sub-right-inputbox timeperson" />
          <select name='reserve_person' class="common-sub-right-inputbox timeperson" id="person">
            <option value='1' selected>1人</option>
            @for($i = 2; $i <= 50; $i++) <option value='{{$i}}'>{{$i}}人</option>
              @endfor
          </select>
          <div class="common-sub-right-input-table">
            <table id="confirm-tbl" class="confirm-tbl">
              <tr>
                <td>Shop</td>
                <td>{{$shop->shop_name}}</td>
              </tr>
              <tr>
                <td>Date</td>
                <td></td>
              </tr>
              <tr>
                <td>Time</td>
                <td></td>
              </tr>
              <tr>
                <td>Number</td>
                <td></td>
              </tr>
            </table>
          </div>
        </div>
        <button type="submit" name="action" value="" class="common-sub-right-confirm">予約する</button>
      </form>
    </div>
  </div>
</div>
@endsection