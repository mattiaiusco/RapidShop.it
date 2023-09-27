<a href="{{ route('announcement.show', $announcement) }}" class="text-decoration-none text-black">
  <div class="card card-custom rounded-4">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center">
          <i class="fa-solid fa-circle-user m-0 pt-3 ps-3 text-black fa-2x"></i>
          <p class="m-0 pt-3 px-3">{{ $announcement->user->name }}</p class="m-0 p-4">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,300) : 'https://picsum.photos/300' }}" class="card-img-top p-2 rounded-4" alt="{{ $announcement->name }}">
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card-body">
          <h5 class="card-title text-truncate">{{ $announcement->name }}</h5>
          <div class="row">
            <div class="col-12">
              <p>{{ $announcement->price }} €</p>
            </div>
          </div>
          <a href="{{route('announcement.bycategory', $announcement->category )}}" class="tx-primary">{{ __("category.{$announcement->category->name}")  }}</a>
        </div>
      </div>
    </div>
  </div>
</a>