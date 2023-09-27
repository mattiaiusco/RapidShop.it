<x-layout title="rapidshop homepage">

    @if (session('message'))
    <div class="alert alert-success m-0 position-absolute success-message w-100">
        {{ session('message') }}
    </div>
    @endif
    <header class="container-fluid header-bg">
        <div class="row align-items-center justify-content-center vh-100">
            <!-- <div class="col-12 col-md-6">
                <img src="./media/header-background.png" class="img-fluid" alt="Illustrazione header">
            </div> -->
            <div class="col-11 col-sm-10 col-md-8 col-lg-6 mb-4 sf-ice py-4 px-3 rounded-5 bordo-header">
                <h1 class="text-center">{{__('ui.headerTitle')}}</h1>
                <h2 class="text-center subtitle-header" id="searchBarHeader">{{__('ui.headerSub')}}
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="70px" height="70px">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <g transform="scale(2,2)">
                                    <path d="M70,44.7v43.7h20.1h24.9c1.8,0 2.7,-2.2 1.4,-3.4l-43,-41.7c-1.3,-1.2 -3.4,-0.3 -3.4,1.4z" fill="#148679"></path>
                                    <path d="M50,44.7v60.2c0,1.8 2.2,2.7 3.5,1.4l16.7,-17.8h24.9c1.8,0 2.7,-2.2 1.4,-3.4l-43.1,-41.8c-1.3,-1.2 -3.4,-0.3 -3.4,1.4z" fill="#ffffff"></path>
                                    <path d="M42.3,24.5c-1.2,0 -2.3,-0.7 -2.8,-1.8l-5.7,-13.9c-0.6,-1.5 0.1,-3.3 1.6,-3.9c1.5,-0.6 3.3,0.1 3.9,1.6l5.8,13.9c0.6,1.5 -0.1,3.3 -1.6,3.9c-0.4,0.2 -0.8,0.2 -1.2,0.2z" fill="#13c1ac"></path>
                                    <path d="M30.9,37c-0.3,0 -0.6,0 -0.9,-0.1l-14.3,-4.5c-1.6,-0.5 -2.5,-2.2 -2,-3.8c0.5,-1.6 2.2,-2.5 3.8,-2l14.3,4.5c1.6,0.5 2.5,2.2 2,3.8c-0.4,1.3 -1.6,2.1 -2.9,2.1z" fill="#13c1ac"></path>
                                    <path d="M98.5,82.8l-43,-41.7c-1.4,-1.4 -3.6,-1.8 -5.4,-1c-1.9,0.8 -3,2.6 -3,4.6v60.2c0,2.1 1.2,3.9 3.2,4.7c0.6,0.2 1.2,0.4 1.8,0.4c1.4,0 2.7,-0.6 3.6,-1.6l13.5,-14.4l9.2,22.2c0.5,1.2 1.6,1.8 2.8,1.8c0.4,0 0.8,-0.1 1.2,-0.2c1.5,-0.6 2.3,-2.4 1.6,-3.9l-9.3,-22.3h20.4c2,0 3.9,-1.2 4.6,-3.1c0.8,-2.1 0.3,-4.2 -1.2,-5.7zM70.1,85.4c-0.8,0 -1.6,0.3 -2.2,1l-14.9,16v-55.3l39.6,38.4h-22.5z" fill="#13c1ac"></path>
                                    <path d="M59.3,25.3c-0.5,0 -0.9,-0.1 -1.4,-0.3c-1.5,-0.8 -2,-2.6 -1.3,-4l7,-13.3c0.8,-1.5 2.6,-2 4,-1.3c1.5,0.8 2,2.6 1.3,4l-7,13.3c-0.5,1 -1.5,1.6 -2.6,1.6z" fill="#13c1ac"></path>
                                </g>
                            </g>
                        </svg>
                    </span>
                </h2>
                <div class="row justify-content-center">
                    <div class="col-10 d-flex justify-content-center">
                        <form action="{{ route('announcements.search') }}" method="GET" class="search w-100">
                            <input name="searched" placeholder="{{__('ui.searchPlaceholder')}}" type="text">
                            <button type="submit">{{__('ui.searchButton')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <main class="container my-5">
        <section>
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center my-5">{{__('ui.lastProducts')}}</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                @forelse ($announcements as $announcement)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 my-3">
                    <x-card :announcement='$announcement' />
                </div>
                @empty
                <h5 class="text-center">{{__('ui.noProduct')}}</h5>
                @endforelse
            </div>
        </section>

    </main>

</x-layout>