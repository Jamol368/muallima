<x-app-layout>

    @section('carousel')
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">{{ __('messages.news') }}</h1>
                    <a href="{{ route('home') }}" class="h5 text-white">{{ __('messages.home') }}</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="{{ route('posts') }}" class="h5 text-white">{{ __('messages.news') }}</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="{{ route('post-category.show', ['postCategory' => $post->post_category_id, 'slug' => $post->postCategory->slug]) }}" class="h5 text-white">{{ $post->postCategory->name }}</a>
                </div>
            </div>
        </div>
    @endsection

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="{{ asset('storage/' . $post->img) }}" alt="">
                        <h1 class="h1 mb-4">{{ $post->title }}</h1>
                        <div class="d-flex mb-3">
                            <small class="me-3"><i class="far fa-eye text-primary me-2"></i>{{ $post->view_count }}
                            </small>
                            <small><i
                                    class="far fa-calendar-alt text-primary me-2"></i>{{ $post->created_at->format('d M, Y') }}
                            </small>
                        </div>
                        <div class="content">
                            {!! $post->content !!}
                        </div>
                        <div class="d-flex flex-wrap mt-4">
                            @foreach($post->tags as $key => $item)
                                <a href="{{ route('post-tag.show', ['postTag' => $item->id, 'slug' => $item->slug]) }}" class="btn btn-light m-1">{{ $item->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                @include('post.post-sidebar')
            </div>
        </div>
    </div>
    <!-- Blog Start -->

</x-app-layout>
