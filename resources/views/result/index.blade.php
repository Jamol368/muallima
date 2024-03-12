<x-app-layout>

    @section('carousel')
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">{{ __('filament.results') }}</h1>
                    <a href="{{ route('home') }}" class="h5 text-white">{{ __('messages.home') }}</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a class="h5 text-white">{{ __('filament.results') }}</a>
                </div>
            </div>
        </div>
    @endsection

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="row g-5">
                        <h2 class="h2">{{ __('filament.results') }}</h2>

                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Test turi</th>
                                <th>Fan</th>
                                <th>To'g'ri javoblar</th>
                                <th>Noto'g'ri javoblar</th>
                                <th>Ball</th>
                                <th>Topshirgan vaqti</th>
                            </thead>
                            <tbody>
                            @foreach($results as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->testType->name }}</td>
                                <td>{{ $item->subject->name }}</td>
                                <td>{{ $item->true_answers }}</td>
                                <td>{{ $item->wrong_answers }}</td>
                                <td>{{ $item->score }}</td>
                                <td>{{ $item->created_at->format('h:i d/m/Y') }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Start -->

</x-app-layout>
