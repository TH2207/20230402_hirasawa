<div class="header">
  <nav class="drawer-nav" id="drawer-nav">
    <ul class="drawer-nav-list">
      <li class="drawer-nav-item">
        <a href="{{ route('reserve.menu') }}" class="drawer-nav-item-text">Home</a>
      </li>
      @empty($user_id)
      <li class="drawer-nav-item">
        <a href="{{ route('register.create') }}" class="drawer-nav-item-text">Registration</a>
      </li>
      <li class="drawer-nav-item">
        <a href="{{ ('/login') }}" class="drawer-nav-item-text">Login</a>
      </li>
      @else
      <li class="drawer-nav-item">
        <a href="{{ route('login.destroy') }}" class="drawer-nav-item-text">Logout</a>
      </li>
      <li class="drawer-nav-item">
        <a href="{{ route('reserve.mypage') }}" class="drawer-nav-item-text">Mypage</a>
      </li>
      @endisset
    </ul>
  </nav>
  <div class="header_ttl">
    <div class="header_menu" id="menu">
      <span class="menu__line--top"></span>
      <span class="menu__line--middle"></span>
      <span class="menu__line--bottom"></span>
    </div>
    <h1 class="header_text">Rese</h1>
  </div>
</div>