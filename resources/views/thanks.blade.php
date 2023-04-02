@extends('layouts.default')

@section('css')
<script src="{{ asset('js/common.js') }}" defer></script>
@endsection

@section('content')
@extends('components.header-common')

<div class="common-finish-main">
  <div class="common-finish-wrapper">
    <p class="common-finish-text">会員登録ありがとうございます。</p>
    <form method="post" action="{{ route('login.store', ['email' => $email, 'password' => $password]) }}" class="common-finish-form">
      @csrf
      <button type="submit" name="action" class="common-finish-button">ログインする</button>
    </form>
  </div>
</div>
@endsection