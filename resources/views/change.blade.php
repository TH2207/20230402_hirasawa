@extends('layouts.default')

@section('css')
<script src="{{ asset('js/common.js') }}" defer></script>
<script src="{{ asset('js/change.js') }}" defer></script>
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
      <form action="{{ route('reserve.update', ['reserve_id' => $reserve->id]) }}" method="post" class="" name="">
        @csrf
        <div class="common-sub-right-input">
          <h2 class="common-sub-right-input-name">予約変更</h2>
          @if (count($errors) > 0)
          <div class="error">
            @error('reserve_at_date')
            <p class="common-text-danger">{{$message}}</p>
            @enderror
          </div>
          @endif
          <input type="date" name="reserve_at_date" value="{{$reserve_at_date}}" class="common-sub-right-inputbox calender" id="date">
          <input type="time" name="reserve_at_time" value="{{$reserve_at_time}}" class="common-sub-right-inputbox timeperson" id="time" />
          <select name='reserve_person' class="common-sub-right-inputbox timeperson" id="person">
            @for($i = 1; $i < 256; $i++) <option value='{{$i}}' {{$i == $reserve->reserve_person ? 'selected' : '' }}>{{$i}}人</option>
              @endfor
          </select>
          <div class="common-sub-right-input-table">
            <table id="confirm-tbl" class="confirm-tbl">
              <tr>
                <td>Shop</td>
                <td>{{$reserve->shop->shop_name}}</td>
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
        <button type="submit" name="action" value="" class="common-sub-right-confirm">予約変更する</button>
      </form>
    </div>
  </div>
</div>
@endsection