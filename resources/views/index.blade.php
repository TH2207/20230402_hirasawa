@extends('layouts.default')

@section('css')
<script src="{{ asset('js/common.js') }}" defer></script>
<script src="{{ asset('js/search.js') }}" defer></script>
@endsection

@section('content')
@extends('components.header-search')

<div class="common-main">
  @if(count($shops))
  <div class="shop-list">
    @foreach($shops as $shop)
    <div class="shop-item">
      @switch($shop->genre_id)
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
        <h2 class="shop-item-detail-ttl">{{$shop->shop_name}}</h2>
        <p class="shop-item-detail-sharp">#{{$shop->region->region}}</p>
        <p class="shop-item-detail-sharp">#{{$shop->genre->genre}}</p>
        <div class="shop-item-box">
          <form method="post" action="{{ route('reserve.detail_move') }}" class="shop-item-box-detail">
            @csrf
            <button class="shop-item-box-btn" type="submit" name="shop_id" value="{{$shop->id}}">詳しくみる</button>
          </form>
          <div class="shop-item-box-favorite">
            @if(array_search($shop->id, $favorites_shopId) !== false)
            <form method="post" action="{{ route('favorite.index_remove') }}">
              @csrf
              <button type="submit" name="shop_id" value="{{$shop->id}}"><i class="fa-solid fa-heart common-heart-red"></i></button>
            </form>
            @else
            <form method="post" action="{{ route('favorite.index_add') }}">
              @csrf
              <button type="submit" name="shop_id" value="{{$shop->id}}"><i class="fa-regular fa-heart"></i></button>
            </form>
            @endempty
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @else
  <p>一致する店舗は見つかりませんでした。</p>
  @endif
</div>
@endsection