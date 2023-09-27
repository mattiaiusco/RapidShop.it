<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-5">{{__('ui.AllProducts')}}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse ($announcements as $announcement)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 my-3">
                    <x-card :announcement='$announcement' />
                </div>
            @empty
                <h4 class="text-center">{{__('ui.noResult')}}</h4>
            @endforelse
            <div class="mt-4">
                {{ $announcements->links() }}
            </div>
        </div>
    </div>
</x-layout>
