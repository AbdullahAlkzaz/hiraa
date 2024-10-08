@if ($configData['mainLayoutType'] === 'horizontal' && isset($configData['mainLayoutType']))
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center {{ $configData['navbarColor'] }}"
        data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <span class="brand-logo">

                            {{-- image  --}}
                            <h2 class="brand-text mb-0">{{ config('app.name') }}</h2>
                    </a>
                </li>
            </ul>
        </div>
    @else
        <nav
            class="header-navbar navbar navbar-expand-lg align-items-center {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }} {{ $configData['layoutWidth'] === 'boxed' && $configData['verticalMenuNavbarType'] === 'navbar-floating' ? 'container-xxl' : '' }}">
@endif
<div class="navbar-container d-flex content">
    <h2 class="content-header-title center" style=" color:#fff;padding:0 1rem; border-right: 1px solid #fff;">@yield('title')</h2>
        
    <!--div class="bookmark-wrapper d-flex align-items-center">
    <ul class="nav navbar-nav d-xl-none">
      <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
            data-feather="menu"></i></a></li>
    </ul>
    <ul class="nav navbar-nav bookmark-icons">
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('app/email') }}"
          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Email"><i class="ficon"
            data-feather="mail"></i></a></li>
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('app/chat') }}"
          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chat"><i class="ficon"
            data-feather="message-square"></i></a></li>
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('app/calendar') }}"
          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Calendar"><i class="ficon"
            data-feather="calendar"></i></a></li>
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('app/todo') }}"
          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Todo"><i class="ficon"
            data-feather="check-square"></i></a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link bookmark-star">
          <i class="ficon text-warning" data-feather="star"></i>
        </a>
        <div class="bookmark-input search-input">
          <div class="bookmark-input-icon">
            <i data-feather="search"></i>
          </div>
          <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
          <ul class="search-list search-list-bookmark"></ul>
        </div>
      </li>
    </ul>
  </div-->
    <a class="nav-link modern-nav-toggle " data-bs-toggle="collapse">
        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4 fa ficon" data-feather="list"></i>
    </a>
    <ul class="nav navbar-nav align-items-center ms-auto">
        <!-- <li class="nav-item dropdown dropdown-language">
            <a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown"
                aria-haspopup="true">
                <i class="flag-icon flag-icon-us"></i>
                <span class="selected-language">{{ __('English') }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">
                <a class="dropdown-item" href="{{ url('lang/en') }}" data-language="en">
                    <i class="flag-icon flag-icon-us"></i> {{ __('English') }}
                </a>
                {{-- <a class="dropdown-item" href="{{ url('lang/ar') }}" data-language="ar">
          <i class="flag-icon flag-icon-ar"></i> {{ __('Arabic') }}
        </a> --}}

            </div>
            </li-->
        <!-- <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                    data-feather="{{ $configData['theme'] === 'dark' ? 'sun' : 'moon' }}"></i></a></li> -->
        <!--li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon"
          data-feather="search"></i></a>
      <div class="search-input">
        <div class="search-input-icon"><i data-feather="search"></i></div>
        <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="search">
        <div class="search-input-close"><i data-feather="x"></i></div>
        <ul class="search-list search-list-main"></ul>
      </div>
    </li-->
        <!--li class="nav-item dropdown dropdown-cart me-25">
      <a class="nav-link" href="javascript:void(0);" data-bs-toggle="dropdown">
        <i class="ficon" data-feather="shopping-cart"></i>
        <span class="badge rounded-pill bg-primary badge-up cart-item-count">6</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
        <li class="dropdown-menu-header">
          <div class="dropdown-header d-flex">
            <h4 class="notification-title mb-0 me-auto">My Cart</h4>
            <div class="badge rounded-pill badge-light-primary">4 Items</div>
          </div>
        </li>
        <li class="scrollable-container media-list">
          <div class="list-item align-items-center">
            <img class="d-block rounded me-1" src="{{ asset('images/pages/eCommerce/1.png') }}" alt="donuts"
              width="62">
            <div class="list-item-body flex-grow-1">
              <i class="ficon cart-item-remove" data-feather="x"></i>
              <div class="media-heading">
                <h6 class="cart-item-title"><a class="text-body" href="{{ url('app/ecommerce/details') }}">
                    Apple
                    watch 5</a></h6><small class="cart-item-by">By Apple</small>
              </div>
              <div class="cart-item-qty">
                <div class="input-group">
                  <input class="touchspin-cart" type="number" value="1">
                </div>
              </div>
              <h5 class="cart-item-price">$374.90</h5>
            </div>
          </div>
          <div class="list-item align-items-center">
            <img class="d-block rounded me-1" src="{{ asset('images/pages/eCommerce/7.png') }}" alt="donuts"
              width="62">
            <div class="list-item-body flex-grow-1">
              <i class="ficon cart-item-remove" data-feather="x"></i>
              <div class="media-heading">
                <h6 class="cart-item-title"><a class="text-body" href="{{ url('app/ecommerce/details') }}">
                    Google
                    Home Mini</a></h6><small class="cart-item-by">By Google</small>
              </div>
              <div class="cart-item-qty">
                <div class="input-group">
                  <input class="touchspin-cart" type="number" value="3">
                </div>
              </div>
              <h5 class="cart-item-price">$129.40</h5>
            </div>
          </div>
          <div class="list-item align-items-center">
            <img class="d-block rounded me-1" src="{{ asset('images/pages/eCommerce/2.png') }}" alt="donuts"
              width="62">
            <div class="list-item-body flex-grow-1">
              <i class="ficon cart-item-remove" data-feather="x"></i>
              <div class="media-heading">
                <h6 class="cart-item-title"><a class="text-body" href="{{ url('app/ecommerce/details') }}">
                    iPhone 11 Pro</a></h6><small class="cart-item-by">By Apple</small>
              </div>
              <div class="cart-item-qty">
                <div class="input-group">
                  <input class="touchspin-cart" type="number" value="2">
                </div>
              </div>
              <h5 class="cart-item-price">$699.00</h5>
            </div>
          </div>
          <div class="list-item align-items-center">
            <img class="d-block rounded me-1" src="{{ asset('images/pages/eCommerce/3.png') }}" alt="donuts"
              width="62">
            <div class="list-item-body flex-grow-1">
              <i class="ficon cart-item-remove" data-feather="x"></i>
              <div class="media-heading">
                <h6 class="cart-item-title"><a class="text-body" href="{{ url('app/ecommerce/details') }}">
                    iMac
                    Pro</a></h6><small class="cart-item-by">By Apple</small>
              </div>
              <div class="cart-item-qty">
                <div class="input-group">
                  <input class="touchspin-cart" type="number" value="1">
                </div>
              </div>
              <h5 class="cart-item-price">$4,999.00</h5>
            </div>
          </div>
          <div class="list-item align-items-center">
            <img class="d-block rounded me-1" src="{{ asset('images/pages/eCommerce/5.png') }}" alt="donuts"
              width="62">
            <div class="list-item-body flex-grow-1">
              <i class="ficon cart-item-remove" data-feather="x"></i>
              <div class="media-heading">
                <h6 class="cart-item-title"><a class="text-body" href="{{ url('app/ecommerce/details') }}">
                    MacBook Pro</a></h6><small class="cart-item-by">By Apple</small>
              </div>
              <div class="cart-item-qty">
                <div class="input-group">
                  <input class="touchspin-cart" type="number" value="1">
                </div>
              </div>
              <h5 class="cart-item-price">$2,999.00</h5>
            </div>
          </div>
        </li>
        <li class="dropdown-menu-footer">
          <div class="d-flex justify-content-between mb-1">
            <h6 class="fw-bolder mb-0">Total:</h6>
            <h6 class="text-primary fw-bolder mb-0">$10,999.00</h6>
          </div>
          <a class="btn btn-primary w-100" href="{{ url('app/ecommerce/checkout') }}">Checkout</a>
        </li>
      </ul>
    </li-->
    
        <!-- <li class="nav-item dropdown dropdown-notification me-25" dir="RTL">
            <a class="nav-link" href="javascript:void(0);" onclick="getNotifications()" data-bs-toggle="dropdown">
                <i class="ficon" data-feather="bell"></i>
                <span
                    class="badge notifications-count rounded-pill bg-danger badge-up">{{ session('notifications_count') }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                <li class="dropdown-menu-header">
                    <div class="dropdown-header d-flex">
                        <h4 class="notification-title mb-0 me-auto">الاشعارات</h4>
                    </div>
                </li>
                <li class="scrollable-container store-notifications media-list">
                </li>
                <li class="dropdown-menu-footer show-all-notifications">
                    <a class="btn btn-primary w-100" href="javascript:void(0)">قراءة كل الاشعارات</a>
                </li>
            </ul>
        </li> -->
        <li class="nav-item dropdown dropdown-user">
            <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
                data-bs-toggle="dropdown" aria-haspopup="true">
                <div class="user-nav d-sm-flex d-none">
                    <span id="auth_user_name" class="user-name fw-bolder">
                        @if (Auth::check())
                            {{ Auth::user()->name }}
                        @else
                            Hani usif
                        @endif
                    </span>
                    <span class="user-status">
                        Admin
                    </span>
                </div>
                <span class="avatar">
                    <img class="round"
                        src="{{ Auth::user() ? asset('storage/' . Auth::user()->image) ?? asset('images/portrait/small/point-logo.png') : asset('images/portrait/small/point-logo.png') }}"
                        alt="avatar" height="40" width="40">
                    <span class="avatar-status-online"></span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                <h6 class="dropdown-header">Manage Profile</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"
                    href="{{ Route::has('profile.show') ? route('profile.show') : 'javascript:void(0)' }}">
                    <i class="me-50" data-feather="user"></i> Profile
                </a>
                @if (Auth::check() && Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
                        <i class="me-50" data-feather="key"></i> API Tokens
                    </a>
                @endif
                <a class="dropdown-item" href="#">
                    <i class="me-50" data-feather="settings"></i> Settings
                </a>

                @if (Auth::User() && Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Manage Team</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item"
                        href="{{ Auth::user() ? route('teams.show', Auth::user()->currentTeam->id) : 'javascript:void(0)' }}">
                        <i class="me-50" data-feather="settings"></i> Team Settings
                    </a>
                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <a class="dropdown-item" href="{{ route('teams.create') }}">
                            <i class="me-50" data-feather="users"></i> Create New Team
                        </a>
                    @endcan

                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">
                        Switch Teams
                    </h6>
                    <div class="dropdown-divider"></div>
                    @if (Auth::user())
                        @foreach (Auth::user()->allTeams() as $team)
                            {{-- Below commented code read by artisan command while installing jetstream. !! Do not remove if you want to use jetstream. --}}

                            <x-jet-switchable-team :team="$team" />
                        @endforeach
                    @endif
                @endif
                @if (Auth::check())
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="me-50" data-feather="power"></i> Logout
                    </a>
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                @else
                    <a class="dropdown-item"
                        href="{{ Route::has('login') ? route('login') : 'javascript:void(0)' }}">
                        <i class="me-50" data-feather="log-in"></i> Login
                    </a>
                @endif
            </div>
        </li>
    </ul>
</div>
</nav>


{{-- Search Start Here --}}
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center">
        <a href="javascript:void(0);">
            <h6 class="section-label mt-75 mb-0">Files</h6>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between w-100" href="{{ url('app/file-manager') }}">
            <div class="d-flex">
                <div class="me-75">
                    <img src="{{ asset('images/icons/xls.png') }}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p>
                    <small class="text-muted">Marketing Manager</small>
                </div>
            </div>
            <small class="search-data-size me-50 text-muted">&apos;17kb</small>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between w-100" href="{{ url('app/file-manager') }}">
            <div class="d-flex">
                <div class="me-75">
                    <img src="{{ asset('images/icons/jpg.png') }}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p>
                    <small class="text-muted">FontEnd Developer</small>
                </div>
            </div>
            <small class="search-data-size me-50 text-muted">&apos;11kb</small>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between w-100" href="{{ url('app/file-manager') }}">
            <div class="d-flex">
                <div class="me-75">
                    <img src="{{ asset('images/icons/pdf.png') }}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p>
                    <small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div>
            <small class="search-data-size me-50 text-muted">&apos;150kb</small>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between w-100" href="{{ url('app/file-manager') }}">
            <div class="d-flex">
                <div class="me-75">
                    <img src="{{ asset('images/icons/doc.png') }}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p>
                    <small class="text-muted">Web Designer</small>
                </div>
            </div>
            <small class="search-data-size me-50 text-muted">&apos;256kb</small>
        </a>
    </li>
    <li class="d-flex align-items-center">
        <a href="javascript:void(0);">
            <h6 class="section-label mt-75 mb-0">Members</h6>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between py-50 w-100" href="{{ url('app/user/view') }}">
            <div class="d-flex align-items-center">
                <div class="avatar me-75">
                    <img src="{{ asset('images/portrait/small/avatar-s-8.jpg') }}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p>
                    <small class="text-muted">UI designer</small>
                </div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between py-50 w-100" href="{{ url('app/user/view') }}">
            <div class="d-flex align-items-center">
                <div class="avatar me-75">
                    <img src="{{ asset('images/portrait/small/avatar-s-1.jpg') }}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p>
                    <small class="text-muted">FontEnd Developer</small>
                </div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between py-50 w-100" href="{{ url('app/user/view') }}">
            <div class="d-flex align-items-center">
                <div class="avatar me-75">
                    <img src="{{ asset('images/portrait/small/avatar-s-14.jpg') }}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p>
                    <small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between py-50 w-100" href="{{ url('app/user/view') }}">
            <div class="d-flex align-items-center">
                <div class="avatar me-75">
                    <img src="{{ asset('images/portrait/small/avatar-s-6.jpg') }}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p>
                    <small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a>
    </li>
</ul>

{{-- if main search not found! --}}
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between">
        <a class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start">
                <span class="me-75" data-feather="alert-circle"></span>
                <span>No results found.</span>
            </div>
        </a>
    </li>
</ul>
{{-- Search Ends --}}
<!-- END: Header-->
