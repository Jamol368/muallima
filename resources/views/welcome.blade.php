<x-app-layout>

    @section('carousel')
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('img/carousel-1.webp') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-2 text-white text-uppercase mb-3 animated slideInDown">Muallima.uz</h1>
                            <h3 class="display-5 text-white mb-md-4 animated zoomIn">Yaxshi muallim - sifatli ta'lim</h3>
                            <a href="#"
                               class="btn btn-success bg-green py-md-3 px-md-5 me-3 animated slideInLeft">{{ __('messages.brief') }}</a>
                            <a href="{{ trans('messages.telegram bot') }}" target="_blank"
                               class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">{{ __('messages.contact') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endsection

    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-green shadow d-flex align-items-center justify-content-center p-4"
                         style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2"
                             style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-green fs-3"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0 fs-6">{{ __('messages.happy clients')}}</h5>
                            <h1 class="text-white mb-0 fs-4" data-toggle="counter-up">{{ $users }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4"
                         style="height: 150px;">
                        <div class="bg-green d-flex align-items-center justify-content-center rounded mb-2"
                             style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white fs-3"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-green mb-0 fs-6">{{ __('messages.tests')}}</h5>
                            <h1 class="mb-0 fs-4" data-toggle="counter-up">{{ $tests }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-green shadow d-flex align-items-center justify-content-center p-4"
                         style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2"
                             style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-green fs-3"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0 fs-6">{{ __('messages.subjects')}}</h5>
                            <h1 class="text-white mb-0 fs-4" data-toggle="counter-up">{{ $subjects }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts Start -->

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-green text-uppercase fz-22">{{ __('messages.recent news') }}</h5>
            </div>
            <div class="row g-5">
                @foreach($posts as $key => $item)
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.{{ 2 + $key }}s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="flex justify-center blog-img position-relative overflow-hidden">
                                <a href="{{ route('post-category.show', ['postCategory' => $item->id, 'slug' => $item->slug]) }}">
                                    <img class="img-fluid" src="{{ asset('storage/' . $item->img) }}" alt="">
                                </a>
                                <a class="position-absolute top-0 start-0 bg-green text-white rounded-end mt-5 py-2 px-4"
                                   href="{{ route('post-category.show', ['postCategory' => $item->id, 'slug' => $item->slug]) }}">{{ $item->postCategory->name }}</a>
                            </div>
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    <small class="me-3"><i class="far fa-eye text-green me-2"></i>{{ $item->view_count }}</small>
                                    <small><i class="far fa-calendar-alt text-green me-2"></i>{{ $item->created_at->format('d M, Y') }}</small>
                                </div>
                                <a href="{{ route('post-category.show', ['postCategory' => $item->id, 'slug' => $item->slug]) }}">
                                    <h4 class="h5 mb-3">{{ $item->title }}</h4>
                                </a>
                                <p>{!! $item->description !!}</p>
                                <a class="btn text-uppercase test-type-btn" href="{{ route('post', ['slug' => $item->slug]) }}">Batafsil</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog Start -->

    <!-- Service Start -->
    <div id="test_type" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="fw-bold text-green text-uppercase fz-22">Test turlari</h1>
            </div>
            <div class="row g-5">
                @foreach($test_types as $key => $item)
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.{{ 2 + $key }}s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                <img class="img-fluid object-cover min-h-250" src="{{ asset('storage/' . $item->img) }}" alt="">
                            </div>
                            <div class="p-4">
                                <h4 class="mb-3 min-h-full">{{ $item->name }}</h4>
                                <div class="min-h-72">{!! $item->description !!}</div>
                                <a class="btn text-uppercase test-type-btn" href="{{ route('subject.list', ['test_type' => $item->id]) }}">Tanlash <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="fw-bold text-green text-uppercase fz-22">{{ __('messages.about') }}</h1>
                    </div>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                        amet
                        diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus
                        clita
                        duo justo et tempor eirmod magna dolore erat amet</p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-green me-3"></i>Aktual testlar</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-green me-3"></i>Professional xodimlar</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-green me-3"></i>24/7 qo'llab-quvvatlash</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-green me-3"></i>Adolatli narxlar</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-green d-flex align-items-center justify-content-center rounded"
                             style="width: 60px; height: 60px;">
                            <i class="fab fa-telegram text-white fs-3"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">{{ __('messages.get in touch') }}</h5>
                            <a href="https://t.me/Muallimauz_bot" target="_blank">
                                <h4 class="text-green mb-0">Telegram bot</h4>
                            </a>
                        </div>
                    </div>
                    <a href="{{ trans('messages.telegram bot') }}" target="_blank" class="btn btn-success py-3 px-5 mt-3 wow zoomIn"
                       data-wow-delay="0.9s">{{ __('messages.contact') }}</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                             src="{{ asset('img/about.jpg') }}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

</x-app-layout>
