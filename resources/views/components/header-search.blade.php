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
  <div class="drawer-nav-search" id="drawer-nav-search">
    <form method="post" action="{{ route('reserve.search') }}" class="drawer-nav-search-form">
      @csrf
      <div class="drawer-nav-search_select">
        <select name="region_id" class="nav_select_box">
          @isset($region_id)
          <option value="">All area</option>
          @foreach($regions as $region)
          <option value="{{ $region->id }}" {{($region->id==$region_id)?"selected":""}}>{{ $region->region }}</option>
          @endforeach
          @else
          <option value="" selected>All area</option>
          @foreach($regions as $region)
          <option value="{{ $region->id }}">{{ $region->region }}</option>
          @endforeach
          @endisset
        </select>
      </div>
      <div class="drawer-nav-search_select">
        <select name="genre_id" class="nav_select_box">
          @isset($genre_id)
          <option value="">All genre</option>
          @foreach($genres as $genre)
          <option value="{{ $genre->id }}" {{($genre->id==$genre_id)?"selected":""}}>{{ $genre->genre }}</option>
          @endforeach
          @else
          <option value="" selected>All genre</option>
          @foreach($genres as $genre)
          <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
          @endforeach
          @endisset
        </select>
      </div>
      <div class="drawer-nav-search_text">
        <button type="submit" id="sbtn2"><i class="fas fa-search drawer-nav-search_text_icon"></i></button>
        @isset($shop_name)
        <input id="sbox2" class="drawer-nav-search_text_box" name="shop_name" type="text" value="{{$shop_name}}" placeholder="Search ..." />
        @else
        <input id="sbox2" class="drawer-nav-search_text_box" name="shop_name" type="text" placeholder="Search ..." />
        @endisset
      </div>
    </form>
  </div>
  <div class="header_ttl">
    <div class="header_menu" id="menu">
      <span class="menu__line--top"></span>
      <span class="menu__line--middle"></span>
      <span class="menu__line--bottom"></span>
    </div>
    <h1 class="header_text">Rese</h1>
  </div>
  <div class="header_menu_search" id="menu_search">
    <i class="fas fa-search"></i>
  </div>
  <div class="header_search">
    <form method="post" action="{{ route('reserve.search') }}" class="search_container">
      @csrf
      <div class="search_select">
        <select name="region_id" class="select_box">
          @isset($region_id)
          <option value="">All area</option>
          @foreach($regions as $region)
          <option value="{{ $region->id }}" {{($region->id==$region_id)?"selected":""}}>{{ $region->region }}</option>
          @endforeach
          @else
          <option value="" selected>All area</option>
          @foreach($regions as $region)
          <option value="{{ $region->id }}">{{ $region->region }}</option>
          @endforeach
          @endisset
        </select>
      </div>
      <div class="search_select">
        <select name="genre_id" class="select_box">
          @isset($genre_id)
          <option value="">All genre</option>
          @foreach($genres as $genre)
          <option value="{{ $genre->id }}" {{($genre->id==$genre_id)?"selected":""}}>{{ $genre->genre }}</option>
          @endforeach
          @else
          <option value="" selected>All genre</option>
          @foreach($genres as $genre)
          <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
          @endforeach
          @endisset
        </select>
      </div>
      <div class="search_text">
        <button type="submit" id="sbtn2"><i class="fas fa-search"></i></button>
        @isset($shop_name)
        <input id="sbox2" class="search_text_box" name="shop_name" type="text" value="{{$shop_name}}" placeholder="Search ..." />
        @else
        <input id="sbox2" class="search_text_box" name="shop_name" type="text" placeholder="Search ..." />
        @endisset
      </div>
    </form>
  </div>
</div>