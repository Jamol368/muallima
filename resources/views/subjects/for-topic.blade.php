<style>
    .navbar-dark {
        background-color: #5674a2;
    }
</style>

<x-app-layout>

    <!-- Service Start -->
    <div id="subject" class="container-fluid py-5 wow fadeInUp mt-lg-5" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">{{ __('messages.test') }}</h5>
                <h1 class="mb-0">Mavzulashtirilgan test uchun fanni tanlang!</h1>
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
                               href="{{ route('topic-result.create', ['subject_slug' => $subject->slug]) }}"
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

</x-app-layout>
