<div class="card rounded-4">
    <div class="row">
        <div class="col-12">
            <p class="m-0 p-3">{{ __('ui.publishedBy') }}: {{ $announcement->user->name }}</p>
        </div>
    </div>
    <!-- Inizio carosello -->
    <div id="carouselExampleIndicators" class="carousel slide">
        @if (count($announcement->images))
            <div class="carousel-inner">
                @foreach ($announcement->images as $image)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ !$announcement->images()->get()->isEmpty()? $image->getUrl(300, 300): 'https://picsum.photos/300' }}"
                            alt="" class="d-block w-100 rounded-4 img-fluid p-2 ">
                        @if ($image->announcement->is_accepted == null)
                            <h4 class="p-3 pb-0">{{ __('ui.imageReview') }}</h4>
                            <div class="col-12 p-3 pt-0">
                                <div class="container-fluid">
                                    <div class="row pt-0">
                                        <div class="col-6 ps-0">
                                            <p>{{ __('ui.adult') }}: <span class="{{ $image->adult }}"></span></p>
                                            <p>{{ __('ui.spoof') }}: <span class="{{ $image->spoof }}"></span></p>
                                            <p>{{ __('ui.racy') }}: <span class="{{ $image->racy }}"></span></p>
                                        </div>
                                        <div class="col-6">
                                            <p>{{ __('ui.violence') }}: <span class="{{ $image->violence }}"></span>
                                            </p>
                                            <p>{{ __('ui.medical') }}: <span class="{{ $image->medical }}"></span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 p-0">
                                            <h4 class="pt-3 pb-0">Tags</h4>
                                            @if ($image->labels)
                                                @foreach ($image->labels as $label)
                                                    <p class="d-inline">{{ $label }}, </p>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            @if (count($announcement->images) > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif
        @else
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/300" class="d-block w-100 rounded-4 img-fluid p-2" alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/300" class="d-block w-100 rounded-4 img-fluid p-2" alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/300" class="d-block w-100 rounded-4 img-fluid p-2" alt="">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        @endif
    </div> <!-- Fine carosello -->
    <div class="card-body">
        <h5 class="card-title">{{ $announcement->name }}</h5>
        <p class="card-text">{{ $announcement->description }}</p>
        <div class="row">
            <div class="col-6">
                <p>{{ $announcement->price }} €</p>
            </div>
        </div>
        <a href="#" class="nav-link mb-3">{{ __("category.{$announcement->category->name}") }}</a>
    </div>
    <div class="card-footer">
        <p class="text-center my-auto">{{ __('ui.dateOfPublishment') }} :
            {{ $announcement->created_at->format('d/m/y') }}</p>
    </div>
</div>
