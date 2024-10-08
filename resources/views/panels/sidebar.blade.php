@php
    $configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{ $configData['theme'] === 'dark' || $configData['theme'] === 'semi-dark' ? 'menu-dark' : 'menu-light' }} menu-accordion menu-shadow"
    data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="brand-logo">
                        <img src="{{ asset('images/portrait/small/point-logo.png') }}" alt="logo">
                    </span>
                    <h2 class="brand-text">{{ config('app.name') }}</h2>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- Foreach menu item starts --}}
            @if (isset($menuData[0]))
                @foreach ($menuData[0]->menu as $menu)
                    @if (
                        (isset($menu->role) and
                            !auth()->user()->hasRole($menu->role)) ||
                            (($menu->slug == 'users' || $menu->slug == 'offices') &&
                                (auth()->user()->type_id == \App\Models\Type::REPRESENTATIVE_TYPE ||
                                    auth()->user()->type_id == \App\Models\Type::SELLER_TYPE)) ||
                            ($menu->slug == 'offices' && auth()->user()->type_id == \App\Models\Type::OFFICE_TYPE) ||
                            ($menu->slug == 'wallet' && !auth()->user()->wallet))
                        @continue
                    @endif
                    @if (isset($menu->navheader))
                        <li class="navigation-header">
                            <span>{{ __('locale.' . $menu->navheader) }}</span>
                            <i data-feather="more-horizontal"></i>
                        </li>
                    @else
                        {{-- Add Custom Class with nav-item --}}
                        @php
                            $custom_classes = '';
                            if (isset($menu->classlist)) {
                                $custom_classes = $menu->classlist;
                            }
                        @endphp
                        <li
                            class="nav-item {{ $custom_classes }} {{ Request::segment(1) === $menu->slug ? 'active' : '' }}">
                            <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                                class="d-flex align-items-center"
                                target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                                <i data-feather="{{ $menu->icon }}"></i>
                                <span class="menu-title text-truncate">{{ __('locale.' . $menu->name) }}</span>
                                @if (isset($menu->badge))
                                    <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                                    <span
                                        class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                                @endif
                            </a>
                            @if (isset($menu->submenu))
                                @include('panels/submenu', ['menu' => $menu->submenu])
                            @endif
                        </li>
                    @endif
                @endforeach
                <hr>
                <li class="nav-item {{ $custom_classes }}">
                    <a href="{{url("logout")}}"
                        class="d-flex align-items-center" >
                        <i data-feather="log-out"></i>
                        <span class="menu-title text-truncate">Logout</span>
                    </a>
                </li>
                
            @endif
            {{-- Foreach menu item ends --}}
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
