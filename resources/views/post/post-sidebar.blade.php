<div class="col-lg-4">
    <!-- Search Form Start -->
    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: slideInUp;">
        <div class="input-group">
            <input type="text" class="form-control p-3" placeholder="{{ __('messages.search') }}">
            <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
        </div>
    </div>
    <!-- Search Form End -->

    <!-- Category Start -->
    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: slideInUp;">
        <div class="section-title section-title-sm position-relative pb-3 mb-4">
            <h3 class="h3 mb-0">{{ __('filament.post category') }}</h3>
        </div>
        <div class="link-animated d-flex flex-column justify-content-start">
            @foreach($categories as $key => $item)
                <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('post-category.show', ['postCategory' => $item->id, 'slug' => $item->slug]) }}"><i class="bi bi-arrow-right me-2"></i>{{ $item->name }}</a>
            @endforeach
        </div>
    </div>
    <!-- Category End -->

    <!-- Recent Post Start -->
    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: slideInUp;">
        <div class="section-title section-title-sm position-relative pb-3 mb-4">
            <h3 class="h3 mb-0">{{ __('messages.recent news') }}</h3>
        </div>
        @foreach($recent_posts as $key => $item)
            <div class="d-flex rounded overflow-hidden mb-3">
                <img class="img-fluid" src="{{ asset('storage/' . $item->img) }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                <a href="{{ route('post', ['slug' => $item->slug]) }}" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0 w-full">{{ $item->title }}
                </a>
            </div>
        @endforeach
    </div>
    <!-- Recent Post End -->

    <!-- Tags Start -->
    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s" style="visibility: hidden; animation-delay: 0.1s; animation-name: none;">
        <div class="section-title section-title-sm position-relative pb-3 mb-4">
            <h3 class="h3 mb-0">{{ __('filament.tag') }}</h3>
        </div>
        <div class="d-flex flex-wrap m-n1">
            @foreach($tags as $key => $item)
                <a href="{{ route('post-tag.show', ['postTag' => $item->id, 'slug' => $item->slug]) }}" class="btn btn-light m-1">{{ $item->name }}</a>
            @endforeach
        </div>
    </div>
    <!-- Tags End -->

</div>
