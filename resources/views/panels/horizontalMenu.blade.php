@php
    $configData = Helper::applClasses();
@endphp
{{-- Horizontal Menu --}}
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal
  {{ $configData['horizontalMenuClass'] }}
  {{ $configData['theme'] === 'dark' ? 'navbar-dark' : 'navbar-light' }}
  navbar-shadow menu-border
  {{ $configData['layoutWidth'] === 'boxed' && $configData['horizontalMenuType'] === 'navbar-floating' ? 'container-xxl' : '' }}"
        role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4 fa fa-arrow-left" ></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                {{-- Foreach menu item starts --}}
                @if (isset($menuData[0]))
                    @foreach ($menuData[0]->menu as $menu)
                        @if (
                            (isset($menu->role) and
                                !auth()->user()->hasRole($menu->role)) ||
                                (($menu->slug == 'users' || $menu->slug == 'offices') &&
                                    (auth()->user()->type_id == \App\Models\Type::REPRESENTATIVE_TYPE ||
                                        auth()->user()->type_id == \App\Models\Type::SELLER_TYPE)) ||
                                ($menu->slug == 'offices' && auth()->user()->type_id == \App\Models\Type::OFFICE_TYPE))
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
                                class="nav-item {{ $custom_classes }}">
                                <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                                    class="btn {{ Request::segment(1) === $menu->slug ? 'btn-primary' : '' }} d-flex align-items-center"
                                    target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                                    <i data-feather="{{ $menu->icon }}"></i>
                                    <span class="menu-title text-truncate h3 {{ Request::segment(1) === $menu->slug ? 'text-light' : '' }}">{{ __('locale.' . $menu->name) }}</span>
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
                @endif
                {{-- Foreach menu item ends --}}
            </ul>
        </div>
    </div>
</div>
