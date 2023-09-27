<x-layout>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-5">{{__("ui.category-explore")}} '{{ strtoupper(__("category.{$category->name}") )}}'</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse ($announcements as $announcement)
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 my-3">
                <x-card :announcement='$announcement' />
            </div>
            @empty
            <p class="text-center my-4">{{__("ui.no-announcement-category")}}</p>
            <div class="row justify-content-center">
                <div class="col-3 d-flex">
                    <button class="btn-aggiungi-prodotto mx-auto">
                        <span class="d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                            </svg>
                            <a href="{{ route('announcement.create') }}" class="nav-link text-nowrap p-0">{{ __('ui.addProduct') }}</a>
                        </span>
                    </button>
                </div>
            </div>
            @endforelse
        </div>
    </div>

</x-layout>