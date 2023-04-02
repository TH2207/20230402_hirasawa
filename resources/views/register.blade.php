@extends('layouts.default')

@section('css')
<script src="{{ asset('js/common.js') }}" defer></script>
@endsection

@section('content')
@extends('components.header-common')

<div class="min-h-screen flex flex-col md:justify-center items-center md:pt-0 md:mt--100">
  <h1 class="w-full md:max-w-md px-6 py-4 bg-blue text-white md:rounded-lg-top">Register</h1>
  <div class="w-full md:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden md:rounded-lg-bottom">
    @if (count($errors) > 0)
    <div class="login-error">
      @error('name')
      <p class="login-text-danger">{{$message}}</p>
      @enderror
      @error('email')
      <p class="login-text-danger">{{$message}}</p>
      @enderror
      @error('password')
      <p class="login-text-danger">{{$message}}</p>
      @enderror
    </div>
    @endif
    <form action="{{ route('register.store') }}" method="post">
      @csrf
      <div class="flex items-center">
        <i class="fa-solid fa-user fa-2x w-16" for="name"></i>
        <x-input id="name" class="block w-full border-text" type="text" name="name" :value="old('name')" placeholder="Username" autofocus />
      </div>

      <div class="mt-4 flex items-center">
        <i class="fa-solid fa-envelope fa-2x w-16" for="email"></i>
        <x-input id="email" class="block w-full border-text" type="text" name="email" :value="old('email')" placeholder="Email" />
      </div>

      <div class="mt-4 flex items-center">
        <i class="fa-solid fa-unlock-keyhole fa-2x w-16" for="password"></i>
        <x-input id="password" class="block w-full border-text" type="password" name="password" placeholder="Password" autocomplete="new-password" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-button class="ml-4">
          {{ __('登録') }}
        </x-button>
      </div>
    </form>
  </div>
</div>
@endsection