<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top py-4 px-2">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 col-md-1 col-lg-3 d-flex align-items-center pe-0">
                    <a href="{{ route('welcome') }}" class="logo-container"><img src="/media/logo.svg" alt="RapidShop logo"
                            class="me-2 logo" width="30" height="24"></a>
                    <a class="navbar-brand font-titoli logotipo" href="{{ route('welcome') }}">RapidShop</a>
                </div>
                <div class="col-8 col-md-9 col-lg-8 mx-auto d-flex justify-content-center ps-0">
                    <form action="{{ route('announcements.search') }}" method="GET"
                        class="search w-100 {{ $display }}" id="searchBar-navbar">
                        <input name="searched" placeholder="{{ __('ui.searchPlaceholder') }}" type="text">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass tx-ice"></i></button>
                    </form>
                </div>
                <div class="col-2 d-lg-none p-0 d-flex justify-content-center ">
                    <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto d-flex align-items-lg-center">
                @auth
                    <li class="nav-item d-flex align-items-center">
                        <button class="btn-aggiungi-prodotto">
                            <span class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                                </svg>
                                <a href="{{ route('announcement.create') }}"
                                    class="nav-link text-nowrap p-0">{{ __('ui.addProduct') }}</a>
                            </span>
                        </button>
                    </li>
                @endauth
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle m-1 text-black " href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.categoryButton') }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-custom">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('announcement.bycategory', $category) }}">{{ __("category.{$category->name}")}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link m-1 text-nowrap text-black"
                        href="{{ route('announcement.index') }}">{{ __('ui.allProducts') }}</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="btn-registrazione btn m-1" href="{{ route('register') }}">{{__('ui.register')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-login btn m-1" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item dropdown my-auto">
                        <a class="nav-link dropdown-toggle ps-1" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" id="navbardropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-custom w-25 ">
                            @if (Auth::user()->is_revisor)
                                <li>
                                    <a class="position-relative text-decoration-none btn-revisor"
                                        href="{{ route('revisor.index') }}">{{ __('ui.revisorZone') }}
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ App\Models\Announcement::toBeRevisionedCount() }}
                                            <span class="visually-hidden">Messaggi non letti</span>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form class="w-100" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button
                                        class="nav-link text-decoration-underline tx-secondary logout-link ps-3">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-black m-0 p-0" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if(Config::get('app.locale')=='en')
                            <x-_locale lang='en' />
                        @elseif(Config::get('app.locale')=='es')
                            <x-_locale lang='es' />
                        @else
                            <x-_locale lang='it' />
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-custom">
                        <li class="nav-item d-flex align-items-center justify-content-start ps-2">
                            <x-_locale lang='it' /> ITALIANO
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-start ps-2">
                            <x-_locale lang='en' /> ENGLISH
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-start ps-2">
                            <x-_locale lang='es' /> ESPANOL
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
