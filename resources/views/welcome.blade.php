<x-app-layout>

    @section('carousel')
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('img/carousel-1.webp') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Muallima.uz</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Yaxshi muallim - sifatli ta'lim</h1>
                            <a href="#"
                               class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">{{ __('messages.brief') }}</a>
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
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4"
                         style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2"
                             style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary fs-3"></i>
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
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2"
                             style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white fs-3"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0 fs-6">{{ __('messages.tests')}}</h5>
                            <h1 class="mb-0 fs-4" data-toggle="counter-up">{{ $tests }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4"
                         style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2"
                             style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-primary fs-3"></i>
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

    <!-- Topic tests Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute rounded wow zoomIn" data-wow-delay="0.9s"
                             src="{{ asset('storage/' . $topic_test_type->img) }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">{{ $topic_test_type->name }}</h5>
                        <h1 class="mb-0">{{ $topic_test_type->name }}</h1>
                    </div>
                    <p class="mb-4">{{ $topic_test_type->description }}</p>
                    <a href="{{ route('topic-test.subjects') }}" class="btn btn-outline-success rounded-start rounded-3 py-3 px-5 mt-3 wow zoomIn"
                       data-wow-delay="0.9s">{{ __('messages.select subject for topic tests') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topic test End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">{{ __('messages.recent news') }}</h5>
                <h1 class="mb-0">{{ __('messages.recent news') }}</h1>
            </div>
            <div class="row g-5">
                @foreach($posts as $key => $item)
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.{{ 2 + $key }}s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="flex justify-center blog-img position-relative overflow-hidden">
                                <a href="{{ route('post-category.show', ['postCategory' => $item->id, 'slug' => $item->slug]) }}">
                                    <img class="img-fluid" src="{{ asset('storage/' . $item->img) }}" alt="">
                                </a>
                                <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4"
                                   href="{{ route('post-category.show', ['postCategory' => $item->id, 'slug' => $item->slug]) }}">{{ $item->postCategory->name }}</a>
                            </div>
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    <small class="me-3"><i class="far fa-eye text-primary me-2"></i>{{ $item->view_count }}</small>
                                    <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ $item->created_at->format('d M, Y') }}</small>
                                </div>
                                <a href="{{ route('post-category.show', ['postCategory' => $item->id, 'slug' => $item->slug]) }}">
                                    <h4 class="h5 mb-3">{{ $item->title }}</h4>
                                </a>
                                <p>{!! $item->description !!}</p>
                                <a class="text-uppercase" href="{{ route('post', ['slug' => $item->slug]) }}">Batafsil <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog Start -->

    <!-- Service Start -->
    <div id="subject" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">{{ __('messages.test') }}</h5>
                <h1 class="mb-0">Attestatsiyaga tayyorlov testlari</h1>
            </div>
            <div class="flex flex-wrap justify-center g-5">
                @foreach($subject_models as $subject)
                    <div class="subject wow zoomIn">
                        <div
                            class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center"
                            style="background-color: {{ $subject->color }} !important;">
                            <div>
                                <img class="subject-img" src="{{ asset('storage/' . $subject->img) }}" alt="muallima">
                            </div>
                            <h2 class="mt-3 mb-3 text-white text-uppercase">{{ $subject->name }}</h2>
                            <a class="btn btn-lg btn-primary rounded"
                               href="{{ route('subject', ['name' => $subject->slug]) }}"
                               style="background-color: {{ $subject->color }};">
                                <i class="bi bi-arrow-right"></i>
                            </a>
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
                        <h5 class="fw-bold text-primary text-uppercase">{{ __('messages.about') }}</h5>
                        <h1 class="mb-0">{{ __('messages.about') }}</h1>
                    </div>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                        amet
                        diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus
                        clita
                        duo justo et tempor eirmod magna dolore erat amet</p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Aktual testlar</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Professional xodimlar</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>24/7 qo'llab-quvvatlash</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Adolatli narxlar</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                             style="width: 60px; height: 60px;">
                            <i class="fab fa-telegram text-white fs-3"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">{{ __('messages.get in touch') }}</h5>
                            <a href="https://t.me/Muallimauz_bot" target="_blank">
                                <h4 class="text-primary mb-0">Telegram bot</h4>
                            </a>
                        </div>
                    </div>
                    <a href="{{ trans('messages.telegram bot') }}" target="_blank" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn"
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
