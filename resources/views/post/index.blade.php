<x-app-layout>

    @section('carousel')
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">{{ __('messages.news') }}</h1>
                    <a href="{{ route('home') }}" class="h5 text-white">{{ __('messages.home') }}</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a class="h5 text-white">{{ __('messages.news') }}</a>
                </div>
            </div>
        </div>
    @endsection

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
            <div class="row g-5">
                @foreach($posts as $key => $item)
                <div class="col-md-6 wow slideInUp" data-wow-delay="0.{{ 2 + $key }}s" style="visibility: visible; animation-delay: 0.1s; animation-name: slideInUp;">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('storage/' . $item->img) }}" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">{{ $item->postCategory?->name }}</a>
                        </div>
                        <div class="p-4">
                            <h4 class="mb-3">{{ $item->title }}</h4>
                            <p>{!! $item->description !!}</p>
                            <a class="text-uppercase" href="">Batafsil <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Display pagination links -->
                {{ $posts->onEachSide(2)->links() }}
            </div>
        </div>

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
                            <h3 class="mb-0">{{ __('filament.post category') }}</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            @foreach($categories as $key => $item)
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>{{ $item->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Category End -->

                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: slideInUp;">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">{{ __('messages.recent news') }}</h3>
                        </div>
                        @foreach($recent_posts as $key => $item)
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{ asset('storage/' . $item->img) }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0 w-full">{{ $item->title }}
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <!-- Recent Post End -->

                    <!-- Tags Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s" style="visibility: hidden; animation-delay: 0.1s; animation-name: none;">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">{{ __('filament.tag') }}</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach($tags as $key => $item)
                            <a href="" class="btn btn-light m-1">{{ $item->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Tags End -->

                </div>
            </div>
            </div>
    </div>
    <!-- Blog Start -->

</x-app-layout>
