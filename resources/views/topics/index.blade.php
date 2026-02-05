<x-app-layout>

    <div id="subject" class="container-fluid py-5 wow fadeInUp mt-lg-5" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto">
                <h1 class="fw-bold text-green text-uppercase fz-22">{{ $subject->name }} fani mavzusini yoki Aralash testni tanlang</h1>
                <h5 class="mb-0">{{ $subject->name }} fanidan mavzulashtirilgan test ishlash</h5>
            </div>

            <div class="container mx-auto mb-5 max-w-md p-6 bg-white shadow-lg rounded-3">
                <h2 class="mb-2">{{ $subject->name }} fani bo'yicha mavzular</h2>
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

            <div class="container mx-auto mt-5 max-w-md p-6 bg-white shadow-lg rounded-3">
                <div class="mixed-quiz flex justify-content-between">
                    <h2>{{ $subject->name }} fani bo'yicha aralash testlar</h2>
                    <a href="{{ route('mixed.test.create', ['subject_id' => $subject->id]) }}" class="btn btn-success px-5 py-2 bg-success font-medium rounded-lg hover:bg-indigo-700 transition">Tanlash</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
