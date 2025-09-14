<x-app-layout>

    @section('carousel')
        <div class="container-fluid bg-green py-5 bg-header" style="margin-bottom: 90px;">
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
                            <div class="col-md-6 wow slideInUp" data-wow-delay="0.{{ 2 + $key }}s"
                                 style="visibility: visible; animation-delay: 0.1s; animation-name: slideInUp;">
                                <div class="blog-item bg-light rounded overflow-hidden">
                                    <div class="flex justify-center blog-img position-relative overflow-hidden">
                                        <img class="img-fluid" src="{{ asset('storage/' . $item->img) }}" alt="">
                                        <a class="position-absolute top-0 start-0 bg-green text-white rounded-end mt-5 py-2 px-4"
                                           href="">{{ $item->postCategory?->name }}</a>
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex mb-3">
                                            <small class="me-3"><i
                                                    class="far fa-eye text-green me-2"></i>{{ $item->view_count }}
                                            </small>
                                            <small><i
                                                    class="far fa-calendar-alt text-green me-2"></i>{{ $item->created_at->format('d M, Y') }}
                                            </small>
                                        </div>
                                        <h4 class="h5 mb-3">{{ $item->title }}</h4>
                                        <p>{!! $item->description !!}</p>
                                        <a class="btn text-uppercase test-type-btn" href="{{ route('post', ['slug' => $item->slug]) }}">Batafsil</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Display pagination links -->
                        {{ $posts->onEachSide(2)->links() }}
                    </div>
                </div>

                @include('post.post-sidebar')
            </div>
        </div>
    </div>
    <!-- Blog Start -->

</x-app-layout>
