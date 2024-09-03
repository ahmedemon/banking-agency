<!--------------------START - Mobile Menu-------------------->
<div class="menu-mobile menu-activated-on-click color-scheme-dark">
    <div class="mm-logo-buttons-w">
        <a class="mm-logo" href="{{route('dashboard')}}">
            <img src="{{ asset('images/logo.png') }}">

            <span style="text-align: center">ব্লু স্টার </span>

        </a>
        <div class="mm-buttons">
            <div class="content-panel-open">
                <div class="os-icon os-icon-grid-circles"></div>
            </div>
            <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
            </div>
        </div>
    </div>
    <div class="menu-and-user">
        <div class="logged-user-w">
            <div class="logged-user-info-w">
                <div class="logged-user-name">{{ Auth::user()->name }}</div>
                <div class="logged-user-role">
                    {{ Auth::user()->getRoleNames()->first() }}
                </div>
            </div>
        </div>
        {{-- // main menu will go here --}}
        @include('partials.main-menu')
    </div>
</div>
<!--------------------END - Mobile Menu-------------------->

<!--------------------START - Main Menu-------------------->
<div class="menu-w color-scheme-dark color-style-default menu-position-top menu-layout-compact sub-menu-style-inside sub-menu-color-bright selected-menu-color-bright menu-activated-on-click menu-has-selected-link" style="margin-bottom: 0px; z-index: 999">
    <div class="logo-w"><a class="logo" href="{{route('dashboard')}}">
            <img src="{{ asset('images/logo.png') }}">
        </a></div>
        @include('partials.main-menu')


        <div class="py-0 px-2 mr-2 rounded-0 border border-secondary d-flex align-items-center">
            <div class="mr-2" style="font-size: 25px;">
                <i class="fas fa-user-alt py-1"></i>
            </div>
            <small class="d-flex align-items-center">
                <strong class="p-0 m-0" style="font-size: 14px;">{{ Auth::user()->name }}</strong>
                <small class="text-danger px-1">|</small>
                <small class="text-capitalize text-grey" style="font-size: 12px;" >{{ str_replace('-',' ',Auth::user()->getRoleNames()->first()) }}</small>
            </small>
        </div>
</div>
<!--------------------END - Main Menu-------------------->
