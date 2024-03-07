<x-app-layout>

    @section('carousel')
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">{{ __('filament.test type') }}</h1>
                    <a href="{{ route('home') }}" class="h5 text-white">{{ __('messages.home') }}</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="{{ route('home').'#subject' }}" class="h5 text-white">{{ __('messages.subjects') }}</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a class="h5 text-white">{{ __('filament.test type') }}</a>
                </div>
            </div>
        </div>
    @endsection

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Latest Blog</h5>
                <h1 class="mb-0">Read The Latest Articles from Our Blog Post</h1>
            </div>
            <div class="row g-5">
                @foreach($testType as $key => $item)
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.{{ 2 + $key }}s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid object-cover min-h-250" src="{{ asset('storage/' . $item->img) }}" alt="">
                        </div>
                        <div class="p-4">
                            <h4 class="mb-3 min-h-full">{{ $item->name }}</h4>
                            <div class="min-h-72">{!! $item->description !!}</div>
                            <a class="text-uppercase" href="{{ route('result.create', ['test_type' => $item->slug]) }}">Tanlash <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog Start -->

</x-app-layout>
