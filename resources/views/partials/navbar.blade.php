<header class="u-clearfix u-custom-color-6 u-header u-sticky u-sticky-c736 u-header" id="sec-2df4" style="display: flex; flex-direction: row;">
    <div class="u-clearfix u-sheet u-sheet-1">
        
        {{-- <nav class="u-align-right-md u-align-right-sm u-align-right-xs u-menu u-menu-dropdown u-offcanvas u-menu-1"> --}}
        
        <nav style="margin-left: 800px; margin-top: 10px">
            <div class="menu-collapse u-custom-font u-font-roboto" style="font-size: 1.125rem; letter-spacing: 0px; text-transform: uppercase; font-weight: 700;">
                <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-file-icon u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-file-icon-1" href="{{ route('welcome') }}">
                    <img src="{{ asset('images/menu.png') }}" alt="">
                </a>
            </div>
            <div class="u-custom-menu u-nav-container">
                <ul class="u-custom-font u-font-roboto u-nav u-spacing-30 u-unstyled u-nav-1">
                    @if(\Illuminate\Support\Facades\Auth::check() === false)
                        <li class="u-nav-item">
                            <a class="u-border-3 u-border-active-custom-color-2 u-border-hover-custom-color-10 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-2 u-text-custom-color-5 u-text-hover-custom-color-10" href="{{ route('welcome') }}" style="padding: 10px 0px;">Главная</a>
                        </li>
                    
                        <li class="u-nav-item">
                            <a class="u-border-3 u-border-active-custom-color-2 u-border-hover-custom-color-10 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-2 u-text-custom-color-5 u-text-hover-custom-color-10" href="{{ route('sign_in') }}" style="padding: 10px 0px;">Вход</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-border-3 u-border-active-custom-color-2 u-border-hover-custom-color-10 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-2 u-text-custom-color-5 u-text-hover-custom-color-10" href="{{ route('sign_up') }}" style="padding: 10px 0px; color: white;">Регистрация</a>
                        </li>
                    @else
                    <br>
                    <li class="u-nav-item">
                        <a class="u-border-3 u-border-active-custom-color-2 u-border-hover-custom-color-10 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-2 u-text-custom-color-5 u-text-hover-custom-color-10" href="" style="padding: 10px 0px;"></a>
                    </li>
                    @endif
                    
                </ul>
            </div>
        </nav>
        <a href="{{ route('welcome') }}" class="u-image u-logo u-image-1">
            <img src="{{ asset('images/default-logo.png') }}" class="u-logo-image u-logo-image-1" alt="">
        </a>
    </div>
</header>
