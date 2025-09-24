<x-app-layout>

    <div id="subject" class="container-fluid py-5 wow fadeInUp mt-lg-5" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto">
                <h1 class="fw-bold text-green text-uppercase fz-22">{{ $subject->name }} fani mavzusini tanlang</h1>
                <h5 class="mb-0">{{ $subject->name }} fanidan mavzulashtirilgan test ishlash</h5>
            </div>

            <div class="container">
            @if($topics->count() > 0)
                    <div class="topics-tree">
                        @foreach($topics as $topic)
                            @include('topics.partials.topic-item', ['topic' => $topic, 'depth' => 0])
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">
                        Mavzular topilmadi.
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
