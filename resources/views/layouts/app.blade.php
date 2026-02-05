<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="muallima, attestatsiya, test">
        <meta name="description" content="muallima.uz attestatsiya testi">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ env('APP_NAME') }}</title>

        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    </head>
    <body>

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="{{ trans('messages.telegram') }}" target="_blank"><small class="me-3 text-light"><i class="fab fa-telegram me-2"></i>Telegram</small></a>
                    <a href="{{ trans('messages.facebook') }}" target="_blank"><small class="me-3 text-light"><i class="fab fa-facebook me-2"></i>Facebook</small></a>
                    <a href="{{ trans('messages.instagram') }}" target="_blank"><small class="me-3 text-light"><i class="fab fa-instagram me-2"></i>Instagram</small></a>
                    <a href="{{ trans('messages.twitter') }}" target="_blank"><small class="text-light"><i class="fab fa-x-twitter me-2"></i>Twitter</small></a>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{ trans('messages.telegram') }}"><i
                            class="fab fa-telegram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{ trans('messages.facebook') }}"><i
                            class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{ trans('messages.instagram') }}"><i
                            class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{ trans('messages.twitter') }}"><i
                            class="fab fa-x-twitter fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-white px-5 py-3 py-lg-0 shadow-lg">
            <a href="{{ route('home') }}" class="navbar-brand p-0">
                <img src="{{ asset('/img/logo-3.png') }}" alt="logo" class="logo-img">
            </a>
            <div class="ml-auto flex gap-2">
            <button class="navbar-toggler" type="button">
                <span class="fa fa-bars"></span>
            </button>
            @if (Route::has('login'))
                @auth
                    <div class="dropdown dropdown-mobile">
                        <button id="profile_btn_mobile" class="nav-item nav-link color-black btn-profile btn-dropdown">
                            <i class="far fa-circle-user"></i>
                        </button>
                        <div class="dropdown-content-mobile">
                            <div class="dropdown-header">
                                <h4 class="fs-5 text-wrap mb-2">{{ auth()->user()->name }}</h4>
                                <p class="fs-7"><i class="fa fa-phone me-2"></i>{{ auth()->user()->formatPhone() }}</p>
                                <p class="fs-7"><i class="fa-solid fa-circle-dollar-to-slot me-2"></i>{{ auth()->user()->userBalance->formatMoney() }}</p>
                            </div>
                                <?php

                                ?>
                            <div class="dropdown-bottom">
                                <a href="{{ route('user-balance.edit') }}"><i class="far fa-circle-user me-2"></i> Profil</a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="logout-btn"><i class="fa fa-arrow-right-from-bracket me-2"></i>{{ __('messages.log_out') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
            @endif
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link color-black {{ Request::is('home')?'active':'' }}">{{ __('messages.home') }}</a>
                    <a href="#" class="nav-item nav-link color-black">{{ __('messages.course') }}</a>
                    <a href="{{ route('home').'#test_type' }}" class="nav-item nav-link color-black">{{ __('messages.test') }}</a>
                    <a href="#" class="nav-item nav-link color-black">{{ __('messages.contest') }}</a>
                    <a href="{{ route('posts') }}" class="nav-item nav-link color-black">{{ __('messages.news') }}</a>
                    <a href="#" class="nav-item nav-link color-black">{{ __('messages.about') }}</a>
                    <a href="{{ trans('messages.telegram_bot') }}" target="_blank" class="nav-item nav-link color-black">{{ __('messages.contact') }}</a>
                    @if (Route::has('login'))
                        @auth
                            <div class="dropdown">
                                <button id="profile_btn" class="nav-item nav-link color-black btn-profile btn-dropdown">
                                    <i class="far fa-circle-user me-2"></i>
                                    {{ explode(' ', auth()->user()->name)[0] ?? auth()->user()->name }}
                                </button>
                                <div class="dropdown-content">
                                    <div class="dropdown-header">
                                        <h4 class="fs-5 text-wrap mb-2">{{ auth()->user()->name }}</h4>
                                        <p class="fs-7"><i class="fa fa-phone me-2"></i>{{ auth()->user()->formatPhone() }}</p>
                                        <p class="fs-7"><i class="fa-solid fa-circle-dollar-to-slot me-2"></i>{{ auth()->user()->userBalance->formatMoney() }}</p>
                                    </div>
                                    <?php

                                        ?>
                                    <div class="dropdown-bottom">
                                        <a href="{{ route('user-balance.edit') }}"><i class="far fa-circle-user me-2"></i> Profil</a>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="logout-btn"><i class="fa fa-arrow-right-from-bracket me-2"></i>{{ __('messages.log_out') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    @endif
                </div>
                @guest
                <a href="{{ route('login') }}"
                   class="btn bg-green color-white py-2 px-4 ms-3">{{ __('messages.log_in') }}</a>
                <a href="{{ route('register') }}"
                       class="btn bg-green color-white py-2 px-4 ms-3">{{ __('messages.register') }}</a>
                @endguest
            </div>

            <div class="overlay"></div>
            <aside id="mobile_sidebar" class="mobile-sidebar">
                <div class="mobile-sidebar-header mt-3">
                    <a href="{{ route('home') }}" class="navbar-brand p-0">
                        <img src="{{ asset('/img/logo-3.png') }}" alt="logo" class="logo-img">
                    </a>
                    <button id="closeBtn" class="close-btn"><i class="far fa-circle-xmark fs-5"></i></button>
                </div>
                <nav class="mobile-sidebar-navbar mt-4 fs-5">
                    <a href="{{ route('home') }}" class="mobile-sidebar-link mb-1 p-2 {{ Request::routeIs('home')?'active':'' }}">{{ __('messages.home') }}</a>
                    <a href="#" class="mobile-sidebar-link mb-1 p-2">{{ __('messages.course') }}</a>
                    <a href="{{ route('home').'#test_type' }}" class="mobile-sidebar-link mb-1 p-2">{{ __('messages.test') }}</a>
                    <a href="#" class="mobile-sidebar-link mb-1 p-2">{{ __('messages.contest') }}</a>
                    <a href="{{ route('posts') }}" class="mobile-sidebar-link mb-1 p-2 {{ Request::routeIs(['posts', 'post', 'post-category.show', 'post-tag.show'])?'active':'' }}">{{ __('messages.news') }}</a>
                    <a href="#" class="mobile-sidebar-link mb-1 p-2">{{ __('messages.about') }}</a>
                    <a href="{{ trans('messages.telegram_bot') }}" target="_blank" class="mobile-sidebar-link mb-1 p-2">{{ __('messages.contact') }}</a>
                    @guest
                        <a href="{{ route('login') }}"
                           class="mobile-sidebar-link mb-1 p-2">{{ __('messages.log_in') }}</a>
                        <a href="{{ route('register') }}"
                           class="mobile-sidebar-link p-2">{{ __('messages.register') }}</a>
                    @endguest
                </nav>
            </aside>
        </nav>

        @yield('carousel')
    </div>
    <!-- Navbar & Carousel End -->

    {{ $slot }}

    @stack('modals')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div
                        class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-green p-4">
                        <a href="{{ route('home') }}" class="navbar-brand">
                            <img src="{{ asset('/img/logo-3.png') }}" alt="logo" class="logo-img">
                        </a>
                        <p class="mt-3 mb-4">Yaxshi muallim - sifatli ta'lim</p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">{{ __('messages.get_in_touch') }}</h3>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fab fa-telegram text-green me-2"></i>
                                <a href="{{ trans('messages.telegram') }}" target="_blank">
                                    <p class="">Telegram</p>
                                </a>
                            </div><div class="d-flex align-items-center mb-2">
                                <i class="fab fa-telegram text-green me-2"></i>
                                <a href="{{ trans('messages.telegram_bot') }}" target="_blank">
                                    <p class="">Telegram bot</p>
                                </a>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fab fa-facebook-f text-green me-2"></i>
                                <a href="{{ trans('messages.facebook') }}" target="_blank">
                                    <p class="">Facebook</p>
                                </a>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fab fa-instagram text-green me-2"></i>
                                <a href="{{ trans('messages.instagram') }}" target="_blank">
                                    <p class="">Instagram</p>
                                </a>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-success btn-square me-2" href="{{ trans('messages.telegram') }}"><i class="fab fa-telegram fw-normal"></i></a>
                                <a class="btn btn-success btn-square me-2" href="{{ trans('messages.facebook') }}"><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-success btn-square me-2" href="{{ trans('messages.instagram') }}"><i
                                        class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-success btn-square" href="{{ trans('messages.twitter') }}"><i
                                        class="fab fa-x-twitter fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">{{ __('messages.quick_links') }}</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="fa fa-arrow-right-long me-2"></i>{{ __('messages.home') }}</a>
                                <a class="text-light mb-2" href="#"><i class="fa fa-arrow-right-long me-2"></i>{{ __('messages.about') }}</a>
                                <a class="text-light mb-2" href="{{ route('posts') }}"><i class="fa fa-arrow-right-long me-2"></i>{{ __('messages.news') }}</a>
                                <a class="text-light" href="#"><i class="fa fa-arrow-right-long me-2"></i>{{ __('messages.contact') }}</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">{{ __('messages.popular_links') }}</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="fa fa-arrow-right-long me-2"></i>{{ __('messages.home') }}</a>
                                <a class="text-light mb-2" href="#"><i class="fa fa-arrow-right-long me-2"></i>{{ __('messages.course') }}</a>
                                <a class="text-light mb-2" href="#"><i class="fa fa-arrow-right-long me-2"></i>{{ __('messages.test') }}</a>
                                <a class="text-light mb-2" href="#"><i class="fa fa-arrow-right-long me-2"></i>{{ __('messages.contest') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>. All Rights
                            Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-success btn-lg-square rounded back-to-top"><i class="fa fa-chevron-up"></i></a>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var preventBack = {{ Session::has('preventBack') ? 'true' : 'false' }};

            if (preventBack) {
                history.pushState(null, null, location.href);
                window.onpopstate = function () {
                    history.go(1);
                };
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/tabs.js') }}"></script>

    @livewireScripts
    </body>
</html>
