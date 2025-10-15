@include('sweetalert::alert')
@php
$config = DB::table('configs')->first();
$service = DB::table('services')->get();

$categories = DB::table('categories')->get();
@endphp
<!doctype html>


<head>
    <meta charset="UTF-8" />

    <title> @yield('titre') - Campus-International-Formation-Canada</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->


    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description" content="Campus-International-Formation-Canada">
 
    <meta name="author" content="soukhinkhan">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ Storage::url($config->icon) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia&display=swap" rel="stylesheet">
    <!-- CSS here -->
    <link rel="stylesheet" href="/front/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/front/assets/css/vendor/animate.min.css">
    <link rel="stylesheet" href="/front/assets/css/plugins/swiper.min.css">
    <link rel="stylesheet" href="/front/assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="/front/assets/css/vendor/fontawesome-pro.css">
    <link rel="stylesheet" href="/front/assets/css/vendor/spacing.css">
    <link rel="stylesheet" href="/front/assets/css/vendor/custom-font.css">
    <link rel="stylesheet" href="/front/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="/front/assets/css/main.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 --}}
    <script src="/Script.js"></script>
    @yield('SEO')
    @yield('services')
    @yield('blogs')
    @yield('offres')

</head>

<!-- Backtotop start -->
<div class="backtotop-wrap cursor-pointer">
    <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- Backtotop end -->

<!-- Offcanvas area start -->
<!-- Offcanvas area start -->
<div class="fix">
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{ route('home') }}"><img src="{{ Storage::url($config->logo) }}" alt="Logo" height="100" width="100" /></a>
                    </div>
                    <div class="offcanvas__close">
                        <button class="offcanvas-close-icon animation--flip">
                            <span class="offcanvas-m-lines">
                                <span class="offcanvas-m-line line--1"></span><span class="offcanvas-m-line line--2"></span><span class="offcanvas-m-line line--3"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="mobile-menu fix"></div>
                <br><br>
                <div class="offcanvas__social">
                    <h3 class="offcanvas__title mb-20">Abonnez-vous et suivez</h3>
                    <ul>
                        <li><a href="{{ $config->facebook }}"><i class="fab fa-facebook-f"></i></a></li>

                        <li><a href="{{ $config->instagram }}"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>
<div class="offcanvas__overlay-white"></div>
<!-- Offcanvas area start -->

<!-- Header area start -->
<header>
    <div id="header-sticky" class="header__area box-shadow-3 header-1 bg-headr-3">
        <div class="header-top-3  d-none d-md-block">
            <div class="container-fluid container-width">
                <div class="top-header__menu-wrapper d-flex justify-content-between align-items-center">
                    <div class="header-top-socail-menu d-flex">
                        <div class="lan-select lan-select-2">
                            <form>

                            </form>
                        </div>

                    </div>

                    <ul class="header-top-menu d-flex">

                    </ul>

                    <div class="header-top-social d-flex">
                        @if ($config->facebook)
                        <a href="{{ $config->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if ($config->messenger)
                        <a href="{{ $config->messenger }}" target="_blank" rel="noopener noreferrer" aria-label="Messenger">
                            <i class="fab fa-facebook-messenger"></i>
                        </a>
                        @endif

                        @if ($config->tiktok)
                        <a href="{{ $config->tiktok }}" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        @endif
                        @if ($config->youtube)
                        <a href="{{ $config->youtube }}"><i class="fab fa-youtube"></i></a>
                        @endif

                        @if ($config->instagram)
                        <a href="{{ $config->instagram }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid home3-container-width">
            <div class="mega__menu-wrapper p-relative">
                <div class="header__main">
                    <div class="header__left">
                        <div class="header__logo header__logo-3">
                            <div class="header__hamburger">
                                <div class="sidebar__toggle">
                                    <button class="bar-icon bar-icon-3">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                            <a href="index.html">
                                <div class="logo logo-3">
                                    <a class="menu-logo" href="{{ route('home') }}"><img src="{{ Storage::url($config->logo) }}" alt="Logo" height="5" width="5" /></a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="header__middle">
                        <div class="mean__menu-wrapper d-none d-lg-block">
                            <div class="main-menu">
                                <nav id="mobile-menu" class="mobile-menu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('home') }}">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Accueil') }}
                                            </a>

                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-item" href="{{ route('about') }}">
                                                {{ __('about') }}
                                            </a>

                                        </li>
                                        <li class="has-dropdown ">
                                            <a href="javascript:void(0)">{{ \App\Helpers\TranslationHelper::TranslateText('Nos Services') }}</a>
                                            <ul class="submenu">
                                                @foreach ($catServices as $category)

                                                @if ($category->site_url)
                                                <li><a href="{{ $category->site_url }}" target="_blank" class=" text-decoration-none">{{ \App\Helpers\TranslationHelper::TranslateText($category->nom) }}

                                                    </a>
                                                </li>
                                                @else
                                                <li><a href="/category_service/{{ $category->id }}/{{ $category->nom }}">{{ \App\Helpers\TranslationHelper::TranslateText($category->nom) }}

                                                    </a>


                                                </li>
                                                @endif
                                                @endforeach


                                            </ul>
                                        </li>

                                        {{-- <li class="has-dropdown ">
                                            <a
                                                href="javascript:void(0)">{{ \App\Helpers\TranslationHelper::TranslateText('Offres') }}</a>
                                        <ul class="submenu">
                                            @foreach ($catoffres as $category)
                                            <li><a href="/category_offre/{{ $category->id }}/{{ $category->nom }}">{{ \App\Helpers\TranslationHelper::TranslateText($category->nom) }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        </li>
                                        --}}
                                        <li class="has-dropdown ">
                                            <a href="javascript:void(0)">{{ \App\Helpers\TranslationHelper::TranslateText('Actualités') }}</a>
                                            <ul class="submenu">
                                                @foreach ($catblogs as $category)
                                                <li><a href="/category_blog/{{ $category->id }}/{{ $category->nom }}">{{ \App\Helpers\TranslationHelper::TranslateText($category->nom) }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>

                                        <li><a href="{{ route('contact') }}">

                                                {{ \App\Helpers\TranslationHelper::TranslateText('Contact') }}
                                            </a>
                                        </li>
                                        @guest
                                        <li>
                                            <a href="{{ url('login') }}">

                                                {{ \App\Helpers\TranslationHelper::TranslateText('Connexion') }}
                                            </a>
                                        </li>
                                        @else
                                        @if (auth()->user()->role != 'client')
                                        <li><a href="{{ url('dashboard') }}" class="nav-item nav-link">Dashboard</a>
                                        </li>
                                        @endif
                                        @endguest

                                        @php
                                        $locales = [
                                        'fr' => ['name' => 'Français', 'flag' => 'https://img.icons8.com/color/20/france-circular.png'],
                                        'en' => ['name' => 'English', 'flag' => 'https://img.icons8.com/color/20/great-britain-circular.png'],

                                        ];
                                        $currentLocale = app()->getLocale();
                                        @endphp

                                        <li>
                                            <div class="custom-dropdown">
                                                <form action="{{ route('locale.change') }}" method="POST">
                                                    @csrf
                                                    <div class="dropdown">
                                                        <button type="button" class="dropbtn">
                                                            <img src="{{ $locales[$currentLocale]['flag'] ?? $locales['fr']['flag'] }}" alt="{{ $currentLocale }}">
                                                            {{ $locales[$currentLocale]['name'] ?? 'Français' }}
                                                        </button>

                                                        <div class="dropdown-content">
                                                            @foreach ($locales as $code => $locale)
                                                            <button type="submit" name="locale" value="{{ $code }}" class="dropdown-item">
                                                                <img src="{{ $locale['flag'] }}" alt="{{ $code }}">
                                                                {{ $locale['name'] }}
                                                            </button>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>

                                        <style>
                                            .custom-dropdown {
                                                position: relative;
                                                display: inline-block;
                                            }

                                            .dropbtn {
                                                display: flex;
                                                align-items: center;
                                                gap: 6px;
                                                background: none;
                                                border: none;
                                                font-family: 'Times New Roman', Times, serif;
                                                font-size: 14px;
                                                font-weight: normal;
                                                color: #003DA5;
                                                cursor: pointer;
                                                padding: 8px 12px;
                                            }

                                            .dropdown-content {
                                                display: none;
                                                position: absolute;
                                                background-color: #fff;
                                                min-width: 160px;
                                                box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
                                                z-index: 999;
                                                border-radius: 6px;
                                            }

                                            .dropdown-content .dropdown-item {
                                                background-color: white;
                                                border: none;
                                                width: 100%;
                                                text-align: left;
                                                padding: 10px 16px;
                                                cursor: pointer;
                                                display: flex;
                                                align-items: center;
                                                font-size: 14px;
                                                color: #000;
                                                /* Texte en noir */
                                            }

                                            .dropdown-content .dropdown-item img {
                                                margin-right: 8px;
                                            }

                                            .dropdown-content .dropdown-item:hover {
                                                background-color: #f2f2f2;
                                            }

                                            .dropdown:hover .dropdown-content {
                                                display: block;
                                            }

                                            .dropdown:hover .dropbtn {
                                                background-color: #eef4ee;
                                            }

                                            /* 📱 Mobile (<768px) */
                                            @media (max-width: 768px) {
                                                .dropbtn {
                                                    font-size: 12px;
                                                    padding: 8px;
                                                }

                                                .dropdown-content {
                                                    position: fixed;
                                                    top: 60px;
                                                    right: 0;
                                                    width: 70%;
                                                    max-width: 280px;
                                                    border-radius: 0 0 0 10px;
                                                    box-shadow: -2px 0 8px rgba(0, 0, 0, 0.2);
                                                }

                                                .dropdown-content .dropdown-item {
                                                    font-size: 16px;
                                                    padding: 14px 20px;
                                                    color: #000;
                                                    /* Texte en noir */
                                                }
                                            }

                                        </style>




                                    </ul>

                                </nav>
                            </div>
                        </div>


                    </div>
                    <div class="header__right">
                        <div class="header__action d-flex align-items-center">
                            <div class="header__social d-none d-sm-inline-flex">

                                <style>
                                    .custom-dropdown {
                                        position: relative;
                                        display: inline-block;
                                    }

                                    .dropbtn {
                                        background-color: white;
                                        border: none;
                                        cursor: pointer;
                                        padding: 5px 10px;
                                        font-size: 14px;
                                        display: flex;
                                        align-items: center;
                                        gap: 5px;
                                    }

                                    .dropdown-content {
                                        display: none;
                                        position: absolute;
                                        background-color: white;

                                        min-width: 120px;
                                        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                                        z-index: 1;
                                        border-radius: 5px;
                                        overflow: hidden;
                                    }

                                    .dropdown:hover .dropdown-content {
                                        display: block;
                                    }

                                    .dropdown-item {
                                        border: none;
                                        background: none;
                                        padding: 10px;
                                        width: 100%;
                                        text-align: left;
                                        cursor: pointer;
                                        display: flex;
                                        align-items: center;
                                        gap: 3px;
                                    }

                                    .dropdown-item:hover {
                                        background-color: #f0f0f0;
                                    }

                                </style>

                            </div>
                            @if (auth()->user())
                            <div class="tp-header-btn d-flex  p-1 d-sm-inline-block d-inline-block" style=" height: 60px;  line-height: 60px;   padding: 0 ;  display: inline-block;font-weight: 700;font-size: 18px; ">
                                {{-- <a class="tp-btn-theme" href="contact.html"><span>Get Started Now</span></a> --}}
                                <div class="dropdown">

                                    <a class=" dropdown-toggle p-3 " href="#" style="font-size: 18px; color: black;" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->prenom }} {{-- {{ Auth::user()->nom }} --}}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="padding:0%; font-size:100%;padding:0%">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">

                                            {{ \App\Helpers\TranslationHelper::TranslateText('Déconnexion') }}
                                        </a>
                                        {{-- <a class="nav-link" href="{{ route('dashboard') }}">Dashboad</a> --}}
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            @endif
                            <div class="header__message d-flex align-items-center">

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header area end -->
<div id="popup-search-box">
    <div class="box-inner-wrap d-flex align-items-center">
        <form id="form" action="#" method="get" role="search">
            <input id="popup-search" type="text" name="s" placeholder="Type keywords here...">
        </form>
        <div class="search-close"><i class="fa-sharp fa-regular fa-xmark"></i></div>
    </div>
</div>

<main>

    @yield('body')

</main>

<div class="messenger-dark">
    <a href="https://m.me/{{ $config->messenger ?? '' }}" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-facebook-messenger"></i>
    </a>
</div>

<style>
    .messenger-dark {
        position: fixed;
        bottom: 160px;
        /* légèrement au-dessus du bouton WhatsApp */
        right: 20px;
        width: 60px;
        height: 60px;
        background-color: #006AFF;
        border: 2px solid #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .messenger-dark a {
        color: #ffffff;
        font-size: 30px;
        text-decoration: none;
    }

    .messenger-dark:hover {
        background-color: #ffffff;
    }

    .messenger-dark:hover a {
        color: #006AFF;
    }

</style>

<div class="whatsapp-dark">
    <a href="https://wa.me/{{ preg_replace('/\D/', '', $config->telephone) }}" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
</div>

<style>
    .whatsapp-dark {
        position: fixed;
        bottom: 90px;
        right: 20px;
        width: 60px;
        height: 60px;
        background-color: #202c33;
        border: 2px solid #25D366;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .whatsapp-dark a {
        color: #25D366;
        font-size: 30px;
        text-decoration: none;
    }

    .whatsapp-dark:hover {
        background-color: #25D366;
    }

    .whatsapp-dark:hover a {
        color: white;
    }

    .whatsapp-float {
        position: fixed;
        bottom: 90px;
        right: 20px;
        background-color: #25D366;
        color: white;
        padding: 10px 15px;
        border-radius: 30px 30px 30px 0;
        display: flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        font-weight: bold;
        z-index: 1000;
    }

    .whatsapp-float i {
        font-size: 24px;
    }

</style>

<!-- Footer area start -->
<footer>
    <section class="footer__area-common background overflow-hidden position-relative z-1">
        <div class="container">
            <div class="row mb-minus-40 footer-wrap">
                <div class="col-lg-3">
                    <a href="#">
                        <img src="{{ Storage::url($config->logo) }}" width="100" height="100" alt="logo not found">
                    </a>
                    <div class="footer__social mt-20">
                        @if ($config->facebook)
                        <a href="{{ $config->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if ($config->messenger)
                        <a href="{{ $config->messenger }}" target="_blank" rel="noopener noreferrer" aria-label="Messenger">
                            <i class="fab fa-facebook-messenger"></i>
                        </a>
                        @endif

                        @if ($config->tiktok)
                        <a href="{{ $config->tiktok }}" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        @endif
                        @if ($config->youtube)
                        <a href="{{ $config->youtube }}"><i class="fab fa-youtube"></i></a>
                        @endif

                        @if ($config->instagram)
                        <a href="{{ $config->instagram }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer__widget footer__widget-item-1">
                        <div class="footer__logo mb-20">
                            {{-- <a href="#">
                                <img src="{{ Storage::url($config->logo) }}" alt="logo not found">
                            </a> --}}
                        </div>
                        <div class="footer__content">
                            <p style=" font-family: 'Times New Roman';color: black;font-size: 18px; line-height: 2; text-align: justify;"> {!! \App\Helpers\TranslationHelper::TranslateText($config->description) !!} </p>
                        </div>


                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="footer__widget footer__widget-item-2">
                        <div class="footer__widget-title">
                            <h4>{{ \App\Helpers\TranslationHelper::TranslateText('Pages') }}</h4>
                        </div>
                        <div class="footer__link">
                            <ul>
                                <li><a href="{{ url('/') }}"><i class="fa-solid fa-angle-right"></i>{{ \App\Helpers\TranslationHelper::TranslateText('Accueil') }}
                                    </a></li>
                                <li><a href="{{ route('about') }}"><i class="fa-solid fa-angle-right"></i>{{ \App\Helpers\TranslationHelper::TranslateText('A propos de nous') }}</a>
                                </li>
                                <li><a href="#"><i class="fa-solid fa-angle-right"></i>
                                        {{ \App\Helpers\TranslationHelper::TranslateText('Nos services') }}
                                    </a></li>
                                <li><a href="{{ route('news') }}"><i class="fa-solid fa-angle-right"></i>{{ \App\Helpers\TranslationHelper::TranslateText('Actualités') }}</a>
                                </li>
                                <li><a href="{{ route('contact') }}"><i class="fa-solid fa-angle-right"></i>{{ \App\Helpers\TranslationHelper::TranslateText('Contact') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="footer__widget footer__widget-item-3">
                        <div class="footer__widget-title">
                            <h4> {{ \App\Helpers\TranslationHelper::TranslateText('Activités') }}</h4>
            </div>
            <div class="footer__link">
                <ul>
                    @foreach ($categories as $category)
                    <li><a href="#"><i class="fa-solid fa-angle-right"></i>{{ \App\Helpers\TranslationHelper::TranslateText($category->nom ?? '') }}</a>
                    </li>
                    @endforeach



                </ul>
            </div>
        </div>
        </div> --}}

        <div class="col-lg-3 col-md-6 ">
            <div class="footer__widget footer__widget-item-4">
                <div class="footer__widget-title">
                    <h4> {{ \App\Helpers\TranslationHelper::TranslateText('Contact') }}</h4>


                </div>

                <div class="footer__subscribe subscribe-2 d-flex mt-15">
                    <ul>
                        <li>
                            <a href="#">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="22" viewBox="0 0 18 22" fill="none">
                                        <path d="M17 9.18182C17 15.5455 9 21 9 21C9 21 1 15.5455 1 9.18182C1 7.01187 1.84285 4.93079 3.34315 3.3964C4.84344 1.86201 6.87827 1 9 1C11.1217 1 13.1566 1.86201 14.6569 3.3964C16.1571 4.93079 17 7.01187 17 9.18182Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8.99967 11.909C10.4724 11.909 11.6663 10.688 11.6663 9.18174C11.6663 7.67551 10.4724 6.45447 8.99967 6.45447C7.52692 6.45447 6.33301 7.67551 6.33301 9.18174C6.33301 10.688 7.52692 11.909 8.99967 11.909Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <p>{{ $config->addresse }}</p>
                            </a>
                        </li>
                        <li class="gap-10">
                            <a href="https://wa.me/{{ preg_replace('/\D/', '', $config->telephone) }}">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <path d="M10.9104 4.05809C11.6586 4.20378 12.3462 4.56898 12.8852 5.10696C13.4242 5.64494 13.7901 6.33121 13.9361 7.07795M10.9104 1C12.4648 1.17235 13.9143 1.8671 15.0209 2.97018C16.1275 4.07326 16.8254 5.5191 17 7.0703M16.234 13.1712V15.4648C16.2349 15.6777 16.1912 15.8884 16.1057 16.0835C16.0203 16.2786 15.8949 16.4537 15.7377 16.5977C15.5805 16.7416 15.3949 16.8512 15.1928 16.9194C14.9908 16.9876 14.7766 17.013 14.5642 16.9938C12.2071 16.7382 9.94297 15.9343 7.95371 14.6467C6.10295 13.4729 4.53384 11.9068 3.35779 10.0596C2.06326 8.0651 1.25765 5.79431 1.00622 3.43118C0.987076 3.21976 1.01225 3.00669 1.08014 2.80551C1.14802 2.60434 1.25713 2.41948 1.40052 2.2627C1.54391 2.10592 1.71843 1.98066 1.91298 1.89489C2.10753 1.80912 2.31785 1.76472 2.53053 1.76452H4.82849C5.20022 1.76087 5.56061 1.89226 5.84247 2.13419C6.12433 2.37613 6.30843 2.71211 6.36046 3.0795C6.45745 3.81349 6.63732 4.53418 6.89665 5.22781C6.99971 5.50145 7.02201 5.79884 6.96092 6.08474C6.89983 6.37065 6.7579 6.63308 6.55195 6.84095L5.57915 7.81189C6.66958 9.7259 8.25739 11.3107 10.1751 12.399L11.1479 11.4281C11.3561 11.2225 11.6191 11.0809 11.9055 11.0199C12.192 10.9589 12.4899 10.9812 12.7641 11.084C13.4591 11.3429 14.1811 11.5224 14.9165 11.6192C15.2886 11.6716 15.6284 11.8587 15.8713 12.1448C16.1143 12.431 16.2433 12.7962 16.234 13.1712Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>

                            </a>
                            <a href="https://wa.me/{{ preg_replace('/\D/', '', $config->telephone) }}" target="_blank">
                                {{ $config->telephone }}

                            </a>
                        </li>
                        <li>
                            <a href="mailto:rrdevs@gmail.com">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" fill="none">
                                        <path d="M2.6 1H15.4C16.28 1 17 1.73125 17 2.625V12.375C17 13.2688 16.28 14 15.4 14H2.6C1.72 14 1 13.2688 1 12.375V2.625C1 1.73125 1.72 1 2.6 1Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M17 2.62512L9 8.31262L1 2.62512" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span>{{ $config->email }}</span>


                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        </div>

        <div class="footer__bottom-wrapper footer__bottom-home-1-bg">
            <div class="container">
                <div class="footer__bottom">
                    <div class="footer__copyright">
                        <p>Copyright {{ date('Y') }} | Design By <a href="#">Campus-International-Formation-Canada</a></p>
                    </div>

                    <div class="footer__copyright-menu">
                        <ul>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<!-- Footer area end -->




<script src="/front/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="/front/assets/js/plugins/waypoints.min.js"></script>
<script src="/front/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="/front/assets/js/plugins/meanmenu.min.js"></script>
<script src="/front/assets/js/plugins/swiper.min.js"></script>
<script src="/front/assets/js/plugins/wow.js"></script>
<script src="/front/assets/js/vendor/magnific-popup.min.js"></script>
<script src="/front/assets/js/vendor/type.js"></script>
<script src="/front/assets/js/plugins/counterup.js"></script>
<script src="/front/assets/js/plugins/nice-select.min.js"></script>
<script src="/front/assets/js/vendor/jquery-ui.min.js"></script>
<script src="/front/assets/js/plugins/parallax-scroll.js"></script>
<script src="/front/assets/js/plugins/jquery.countdown.min.js"></script>
<script src="/front/assets/js/plugins/isotope-docs.min.js"></script>
<script src="/front/assets/js/vendor/ajax-form.js"></script>
<script src="/front/assets/js/plugins/slick.min.js"></script>
<script src="/front/assets/js/main.js"></script>


</body>

</html>
