<header class="u-clearfix u-custom-color-6 u-header u-sticky u-sticky-c736 u-header flex items-center" id="sec-2df4">
    <a href="{{ route('welcome') }}" class="ml-10">
        <img src="{{ asset('images/logo.png') }}" alt="logo">
    </a>
    <nav class="mr-10 ml-auto">
        <ul class="u-custom-font u-font-roboto u-nav u-spacing-30 u-unstyled u-nav-1">
            @if(\Illuminate\Support\Facades\Auth::check() === false)
                <li class="u-nav-item">
                    <a class="u-border-3 u-border-active-custom-color-2 u-border-hover-custom-color-10 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-2 u-text-custom-color-5 u-text-hover-custom-color-10"
                       href="{{ route('sign_in') }}" style="padding: 10px 0px;">Вход</a>
                </li>
                <li class="u-nav-item">
                    <a class="u-border-3 u-border-active-custom-color-2 u-border-hover-custom-color-10 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-2 u-text-custom-color-5 u-text-hover-custom-color-10"
                       href="{{ route('sign_up') }}" style="padding: 10px 0px; color: white;">Регистрация</a>
                </li>
            @endif
        </ul>
    </nav>
</header>
