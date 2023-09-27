<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center">{{ __('ui.AddProduct') }}</h1>
            </div>
            <div class="col-6 d-flex justify-content-center">
                @if (session('status'))
                    <div class="alert alert-success m-0">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <livewire:create-announcement />
        </div>
    </div>
</x-layout>
