@extends('layouts.default')

@section('css')
<script src="{{ asset('js/common.js') }}" defer></script>
@endsection

@section('content')
@extends('components.header-common')

<div class="common-finish-main">
  <div class="common-finish-wrapper">
    <p class="common-finish-text">ご予約ありがとうございます。</p>
    <form method="post" action="{{ route('reserve.back') }}" class="common-finish-form">
      @csrf
      <button type="submit" name="action" value="back" class="common-finish-button">戻る</button>
    </form>
  </div>
</div>
@endsection