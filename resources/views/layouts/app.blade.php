<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="muallima, attestatsiya, test">
        <meta name="description" content="muallima.uz attestatsiya testi">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ env('APP_NAME') }}</title>

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.15.3/dist/katex.min.css">
        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.15.3/dist/katex.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.15.3/dist/contrib/auto-render.min.js"></script>

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */
            *, ::after, ::before {
                box-sizing: border-box;
                border-width: 0;
                border-style: solid;
                border-color: #e5e7eb
            }

            ::after, ::before {
                --tw-content: ''
            }

            html {
                line-height: 1.5;
                -webkit-text-size-adjust: 100%;
                -moz-tab-size: 4;
                tab-size: 4;
                font-family: Figtree, sans-serif;
                font-feature-settings: normal
            }

            body {
                margin: 0;
                line-height: inherit
            }

            hr {
                height: 0;
                color: inherit;
                border-top-width: 1px
            }

            abbr:where([title]) {
                -webkit-text-decoration: underline dotted;
                text-decoration: underline dotted
            }

            h1, h2, h3, h4, h5, h6 {
                font-size: inherit;
                font-weight: inherit
            }

            a {
                color: inherit;
                text-decoration: inherit
            }

            b, strong {
                font-weight: bolder
            }

            code, kbd, pre, samp {
                font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
                font-size: 1em
            }

            small {
                font-size: 80%
            }

            sub, sup {
                font-size: 75%;
                line-height: 0;
                position: relative;
                vertical-align: baseline
            }

            sub {
                bottom: -.25em
            }

            sup {
                top: -.5em
            }

            table {
                text-indent: 0;
                border-color: inherit;
                border-collapse: collapse
            }

            button, input, optgroup, select, textarea {
                font-family: inherit;
                font-size: 100%;
                font-weight: inherit;
                line-height: inherit;
                color: inherit;
                margin: 0;
                padding: 0
            }

            button, select {
                text-transform: none
            }

            [type=button], [type=reset], [type=submit], button {
                -webkit-appearance: button;
                background-color: transparent;
                background-image: none
            }

            :-moz-focusring {
                outline: auto
            }

            :-moz-ui-invalid {
                box-shadow: none
            }

            progress {
                vertical-align: baseline
            }

            ::-webkit-inner-spin-button, ::-webkit-outer-spin-button {
                height: auto
            }

            [type=search] {
                -webkit-appearance: textfield;
                outline-offset: -2px
            }

            ::-webkit-search-decoration {
                -webkit-appearance: none
            }

            ::-webkit-file-upload-button {
                -webkit-appearance: button;
                font: inherit
            }

            summary {
                display: list-item
            }

            blockquote, dd, dl, figure, h1, h2, h3, h4, h5, h6, hr, p, pre {
                margin: 0
            }

            fieldset {
                margin: 0;
                padding: 0
            }

            legend {
                padding: 0
            }

            menu, ol, ul {
                list-style: none;
                margin: 0;
                padding: 0
            }

            textarea {
                resize: vertical
            }

            input::placeholder, textarea::placeholder {
                opacity: 1;
                color: #9ca3af
            }

            [role=button], button {
                cursor: pointer
            }

            :disabled {
                cursor: default
            }

            audio, canvas, embed, iframe, img, object, svg, video {
                display: block;
                vertical-align: middle
            }

            img, video {
                max-width: 100%;
                height: auto
            }

            [hidden] {
                display: none
            }

            *, ::before, ::after {
                --tw-border-spacing-x: 0;
                --tw-border-spacing-y: 0;
                --tw-translate-x: 0;
                --tw-translate-y: 0;
                --tw-rotate: 0;
                --tw-skew-x: 0;
                --tw-skew-y: 0;
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                --tw-pan-x: ;
                --tw-pan-y: ;
                --tw-pinch-zoom: ;
                --tw-scroll-snap-strictness: proximity;
                --tw-ordinal: ;
                --tw-slashed-zero: ;
                --tw-numeric-figure: ;
                --tw-numeric-spacing: ;
                --tw-numeric-fraction: ;
                --tw-ring-inset: ;
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: rgb(59 130 246 / 0.5);
                --tw-ring-offset-shadow: 0 0 #0000;
                --tw-ring-shadow: 0 0 #0000;
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                --tw-blur: ;
                --tw-brightness: ;
                --tw-contrast: ;
                --tw-grayscale: ;
                --tw-hue-rotate: ;
                --tw-invert: ;
                --tw-saturate: ;
                --tw-sepia: ;
                --tw-drop-shadow: ;
                --tw-backdrop-blur: ;
                --tw-backdrop-brightness: ;
                --tw-backdrop-contrast: ;
                --tw-backdrop-grayscale: ;
                --tw-backdrop-hue-rotate: ;
                --tw-backdrop-invert: ;
                --tw-backdrop-opacity: ;
                --tw-backdrop-saturate: ;
                --tw-backdrop-sepia:
            }

            ::-webkit-backdrop {
                --tw-border-spacing-x: 0;
                --tw-border-spacing-y: 0;
                --tw-translate-x: 0;
                --tw-translate-y: 0;
                --tw-rotate: 0;
                --tw-skew-x: 0;
                --tw-skew-y: 0;
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                --tw-pan-x: ;
                --tw-pan-y: ;
                --tw-pinch-zoom: ;
                --tw-scroll-snap-strictness: proximity;
                --tw-ordinal: ;
                --tw-slashed-zero: ;
                --tw-numeric-figure: ;
                --tw-numeric-spacing: ;
                --tw-numeric-fraction: ;
                --tw-ring-inset: ;
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: rgb(59 130 246 / 0.5);
                --tw-ring-offset-shadow: 0 0 #0000;
                --tw-ring-shadow: 0 0 #0000;
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                --tw-blur: ;
                --tw-brightness: ;
                --tw-contrast: ;
                --tw-grayscale: ;
                --tw-hue-rotate: ;
                --tw-invert: ;
                --tw-saturate: ;
                --tw-sepia: ;
                --tw-drop-shadow: ;
                --tw-backdrop-blur: ;
                --tw-backdrop-brightness: ;
                --tw-backdrop-contrast: ;
                --tw-backdrop-grayscale: ;
                --tw-backdrop-hue-rotate: ;
                --tw-backdrop-invert: ;
                --tw-backdrop-opacity: ;
                --tw-backdrop-saturate: ;
                --tw-backdrop-sepia:
            }

            ::backdrop {
                --tw-border-spacing-x: 0;
                --tw-border-spacing-y: 0;
                --tw-translate-x: 0;
                --tw-translate-y: 0;
                --tw-rotate: 0;
                --tw-skew-x: 0;
                --tw-skew-y: 0;
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                --tw-pan-x: ;
                --tw-pan-y: ;
                --tw-pinch-zoom: ;
                --tw-scroll-snap-strictness: proximity;
                --tw-ordinal: ;
                --tw-slashed-zero: ;
                --tw-numeric-figure: ;
                --tw-numeric-spacing: ;
                --tw-numeric-fraction: ;
                --tw-ring-inset: ;
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: rgb(59 130 246 / 0.5);
                --tw-ring-offset-shadow: 0 0 #0000;
                --tw-ring-shadow: 0 0 #0000;
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                --tw-blur: ;
                --tw-brightness: ;
                --tw-contrast: ;
                --tw-grayscale: ;
                --tw-hue-rotate: ;
                --tw-invert: ;
                --tw-saturate: ;
                --tw-sepia: ;
                --tw-drop-shadow: ;
                --tw-backdrop-blur: ;
                --tw-backdrop-brightness: ;
                --tw-backdrop-contrast: ;
                --tw-backdrop-grayscale: ;
                --tw-backdrop-hue-rotate: ;
                --tw-backdrop-invert: ;
                --tw-backdrop-opacity: ;
                --tw-backdrop-saturate: ;
                --tw-backdrop-sepia:
            }

            .relative {
                position: relative
            }

            .mx-auto {
                margin-left: auto;
                margin-right: auto
            }

            .mx-6 {
                margin-left: 1.5rem;
                margin-right: 1.5rem
            }

            .ml-4 {
                margin-left: 1rem
            }

            .mt-16 {
                margin-top: 4rem
            }

            .mt-6 {
                margin-top: 1.5rem
            }

            .mt-4 {
                margin-top: 1rem
            }

            .-mt-px {
                margin-top: -1px
            }

            .mr-1 {
                margin-right: 0.25rem
            }

            .flex {
                display: flex
            }

            .inline-flex {
                display: inline-flex
            }

            .grid {
                display: grid
            }

            .h-16 {
                height: 4rem
            }

            .h-7 {
                height: 1.75rem
            }

            .h-6 {
                height: 1.5rem
            }

            .h-5 {
                height: 1.25rem
            }

            .min-h-screen {
                min-height: 100vh
            }

            .w-auto {
                width: auto
            }

            .w-16 {
                width: 4rem
            }

            .w-7 {
                width: 1.75rem
            }

            .w-6 {
                width: 1.5rem
            }

            .w-5 {
                width: 1.25rem
            }

            .max-w-7xl {
                max-width: 80rem
            }

            .shrink-0 {
                flex-shrink: 0
            }

            .scale-100 {
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
            }

            .grid-cols-1 {
                grid-template-columns:repeat(1, minmax(0, 1fr))
            }

            .items-center {
                align-items: center
            }

            .justify-center {
                justify-content: center
            }

            .gap-6 {
                gap: 1.5rem
            }

            .gap-4 {
                gap: 1rem
            }

            .self-center {
                align-self: center
            }

            .rounded-lg {
                border-radius: 0.5rem
            }

            .rounded-full {
                border-radius: 9999px
            }

            .bg-gray-100 {
                --tw-bg-opacity: 1;
                background-color: rgb(243 244 246 / var(--tw-bg-opacity))
            }

            .bg-white {
                --tw-bg-opacity: 1;
                background-color: rgb(255 255 255 / var(--tw-bg-opacity))
            }

            .bg-red-50 {
                --tw-bg-opacity: 1;
                background-color: rgb(254 242 242 / var(--tw-bg-opacity))
            }

            .bg-dots-darker {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")
            }

            .from-gray-700\/50 {
                --tw-gradient-from: rgb(55 65 81 / 0.5);
                --tw-gradient-to: rgb(55 65 81 / 0);
                --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
            }

            .via-transparent {
                --tw-gradient-to: rgb(0 0 0 / 0);
                --tw-gradient-stops: var(--tw-gradient-from), transparent, var(--tw-gradient-to)
            }

            .bg-center {
                background-position: center
            }

            .stroke-red-500 {
                stroke: #ef4444
            }

            .stroke-gray-400 {
                stroke: #9ca3af
            }

            .p-6 {
                padding: 1.5rem
            }

            .px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .text-center {
                text-align: center
            }

            .text-right {
                text-align: right
            }

            .text-xl {
                font-size: 1.25rem;
                line-height: 1.75rem
            }

            .text-sm {
                font-size: 0.875rem;
                line-height: 1.25rem
            }

            .font-semibold {
                font-weight: 600
            }

            .leading-relaxed {
                line-height: 1.625
            }

            .text-gray-600 {
                --tw-text-opacity: 1;
                color: rgb(75 85 99 / var(--tw-text-opacity))
            }

            .text-gray-900 {
                --tw-text-opacity: 1;
                color: rgb(17 24 39 / var(--tw-text-opacity))
            }

            .text-gray-500 {
                --tw-text-opacity: 1;
                color: rgb(107 114 128 / var(--tw-text-opacity))
            }

            .underline {
                -webkit-text-decoration-line: underline;
                text-decoration-line: underline
            }

            .antialiased {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale
            }

            .shadow-2xl {
                --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
                --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
            }

            .shadow-gray-500\/20 {
                --tw-shadow-color: rgb(107 114 128 / 0.2);
                --tw-shadow: var(--tw-shadow-colored)
            }

            .transition-all {
                transition-property: all;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms
            }

            .selection\:bg-red-500 *::selection {
                --tw-bg-opacity: 1;
                background-color: rgb(239 68 68 / var(--tw-bg-opacity))
            }

            .selection\:text-white *::selection {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .selection\:bg-red-500::selection {
                --tw-bg-opacity: 1;
                background-color: rgb(239 68 68 / var(--tw-bg-opacity))
            }

            .selection\:text-white::selection {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .hover\:text-gray-900:hover {
                --tw-text-opacity: 1;
                color: rgb(17 24 39 / var(--tw-text-opacity))
            }

            .hover\:text-gray-700:hover {
                --tw-text-opacity: 1;
                color: rgb(55 65 81 / var(--tw-text-opacity))
            }

            .focus\:rounded-sm:focus {
                border-radius: 0.125rem
            }

            .focus\:outline:focus {
                outline-style: solid
            }

            .focus\:outline-2:focus {
                outline-width: 2px
            }

            .focus\:outline-red-500:focus {
                outline-color: #ef4444
            }

            .group:hover .group-hover\:stroke-gray-600 {
                stroke: #4b5563
            }

            .z-10 {
                z-index: 10
            }

            @media (prefers-reduced-motion: no-preference) {
                .motion-safe\:hover\:scale-\[1\.01\]:hover {
                    --tw-scale-x: 1.01;
                    --tw-scale-y: 1.01;
                    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
                }
            }

            @media (prefers-color-scheme: dark) {
                .dark\:bg-gray-900 {
                    --tw-bg-opacity: 1;
                    background-color: rgb(17 24 39 / var(--tw-bg-opacity))
                }

                .dark\:bg-gray-800\/50 {
                    background-color: rgb(31 41 55 / 0.5)
                }

                .dark\:bg-red-800\/20 {
                    background-color: rgb(153 27 27 / 0.2)
                }

                .dark\:bg-dots-lighter {
                    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")
                }

                .dark\:bg-gradient-to-bl {
                    background-image: linear-gradient(to bottom left, var(--tw-gradient-stops))
                }

                .dark\:stroke-gray-600 {
                    stroke: #4b5563
                }

                .dark\:text-gray-400 {
                    --tw-text-opacity: 1;
                    color: rgb(156 163 175 / var(--tw-text-opacity))
                }

                .dark\:text-white {
                    --tw-text-opacity: 1;
                    color: rgb(255 255 255 / var(--tw-text-opacity))
                }

                .dark\:shadow-none {
                    --tw-shadow: 0 0 #0000;
                    --tw-shadow-colored: 0 0 #0000;
                    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
                }

                .dark\:ring-1 {
                    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                    box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
                }

                .dark\:ring-inset {
                    --tw-ring-inset: inset
                }

                .dark\:ring-white\/5 {
                    --tw-ring-color: rgb(255 255 255 / 0.05)
                }

                .dark\:hover\:text-white:hover {
                    --tw-text-opacity: 1;
                    color: rgb(255 255 255 / var(--tw-text-opacity))
                }

                .group:hover .dark\:group-hover\:stroke-gray-400 {
                    stroke: #9ca3af
                }
            }

            @media (min-width: 640px) {
                .sm\:fixed {
                    position: fixed
                }

                .sm\:top-0 {
                    top: 0px
                }

                .sm\:right-0 {
                    right: 0px
                }

                .sm\:ml-0 {
                    margin-left: 0px
                }

                .sm\:flex {
                    display: flex
                }

                .sm\:items-center {
                    align-items: center
                }

                .sm\:justify-center {
                    justify-content: center
                }

                .sm\:justify-between {
                    justify-content: space-between
                }

                .sm\:text-left {
                    text-align: left
                }

                .sm\:text-right {
                    text-align: right
                }
            }

            @media (min-width: 768px) {
                .md\:grid-cols-2 {
                    grid-template-columns:repeat(2, minmax(0, 1fr))
                }
            }

            @media (min-width: 1024px) {
                .lg\:gap-8 {
                    gap: 2rem
                }

                .lg\:p-8 {
                    padding: 2rem
                }
            }
        </style>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>

    <!-- Spinner Start -->
    <div id="spinner"
         class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->

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
        <nav class="navbar navbar-expand-lg navbar-dark bg-white px-5 py-3 py-lg-0">
            <a href="{{ route('home') }}" class="navbar-brand p-0">
                <img src="{{ asset('/img/logo-3.png') }}" alt="logo" class="logo-img">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link color-black {{ Request::is('home')?'active':'' }}">{{ __('messages.home') }}</a>
                    <a href="#" class="nav-item nav-link color-black">{{ __('messages.course') }}</a>
                    <a href="{{ route('home').'#test_type' }}" class="nav-item nav-link color-black">{{ __('messages.test') }}</a>
                    <a href="#" class="nav-item nav-link color-black">{{ __('messages.contest') }}</a>
                    <a href="{{ route('posts') }}" class="nav-item nav-link color-black">{{ __('messages.news') }}</a>
                    <a href="#" class="nav-item nav-link color-black">{{ __('messages.about') }}</a>
                    <a href="{{ trans('messages.telegram bot') }}" target="_blank" class="nav-item nav-link color-black">{{ __('messages.contact') }}</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('user-balance.edit') }}" class="nav-item nav-link color-black">Profil</a>
                        @endauth
                    @endif
                </div>
                @guest
                <a href="{{ route('login') }}"
                   class="btn bg-green color-white py-2 px-4 ms-3">{{ __('messages.log in') }}</a>
                <a href="{{ route('register') }}"
                       class="btn bg-green color-white py-2 px-4 ms-3">{{ __('messages.register') }}</a>
                @endguest
            </div>
        </nav>

        @yield('carousel')
    </div>
    <!-- Navbar & Carousel End -->

    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                            aria-label="Close">&#10005;
                    </button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3"
                               placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

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
                                    <h3 class="text-light mb-0">{{ __('messages.get in touch') }}</h3>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-telegram text-green me-2"></i>
                                    <a href="{{ trans('messages.telegram') }}" target="_blank">
                                        <p class="">Telegram</p>
                                    </a>
                                </div><div class="d-flex mb-2">
                                    <i class="bi bi-telegram text-green me-2"></i>
                                    <a href="{{ trans('messages.telegram bot') }}" target="_blank">
                                        <p class="">Telegram bot</p>
                                    </a>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-facebook text-green me-2"></i>
                                    <a href="{{ trans('messages.facebook') }}" target="_blank">
                                        <p class="">Facebook</p>
                                    </a>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-instagram text-green me-2"></i>
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
                                    <h3 class="text-light mb-0">{{ __('messages.quick links') }}</h3>
                                </div>
                                <div class="link-animated d-flex flex-column justify-content-start">
                                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>{{ __('messages.home') }}</a>
                                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>{{ __('messages.about') }}</a>
                                    <a class="text-light mb-2" href="{{ route('posts') }}"><i class="bi bi-arrow-right me-2"></i>{{ __('messages.news') }}</a>
                                    <a class="text-light" href="#"><i class="bi bi-arrow-right me-2"></i>{{ __('messages.contact') }}</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                                <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                    <h3 class="text-light mb-0">{{ __('messages.popular links') }}</h3>
                                </div>
                                <div class="link-animated d-flex flex-column justify-content-start">
                                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>{{ __('messages.home') }}</a>
                                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>{{ __('messages.course') }}</a>
                                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>{{ __('messages.test') }}</a>
                                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>{{ __('messages.contest') }}</a>
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
        <a href="#" class="btn btn-lg btn-success btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>
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


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/tabs.js') }}"></script>

        @livewireScripts
    </body>
</html>
