<x-app-layout>

        @section('carousel')
            <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
                <div class="row py-5">
                    <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-4 text-white animated zoomIn">{{ __('messages.profile') }}</h1>
                        <a href="{{ route('home') }}" class="h5 text-white">{{ __('messages.home') }}</a>
                        <i class="far fa-circle text-white px-2"></i>
                        <a class="h5 text-white">{{ __('messages.profile') }}</a>
                    </div>
                </div>
            </div>
        @endsection

        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="profile-card container mx-auto max-w-md p-6 bg-white shadow-lg rounded-3">
                        <h1 class="h2 text-center mt-4">Mening natijalarim</h1>
                        <div class="container py-5 overflow-auto">
                            <div class="row g-5">
                                <table class="table overflow-x-scroll">
                                    <thead>
                                    <th>#</th>
                                    <th>Test turi</th>
                                    <th>Fan</th>
                                    <th>Mavzu</th>
                                    <th>Sinf</th>
                                    <th>Qism</th>
                                    <th>To'g'ri javoblar</th>
                                    <th>Noto'g'ri javoblar</th>
                                    <th>Ball</th>
                                    <th>Topshirgan vaqti</th>
                                    <th>Amallar</th>
                                    </thead>
                                    <tbody>
                                    @foreach($results as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->testType->name }}</td>
                                            <td>{{ $item->subject->name }}</td>
                                            <td>{{ $item->topic->name ?? ($item->mixed ? 'Aralash test' : '') }}</td>
                                            <td>{{ $item->degree }}</td>
                                            <td>{{ $item->part }}</td>
                                            <td>{{ $item->true_answers }}</td>
                                            <td>{{ $item->wrong_answers }}</td>
                                            <td>{{ $item->score }}</td>
                                            <td>{{ $item->created_at->format('H:i d/m/Y') }}</td>
                                            <td><a href="{{ route('results.detailed', ['result' => $item->id]) }}" class="btn border">Batafsil</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-sm-3">
                        <x-profile-sidebar :user="Auth::user()" />
                    </div>
                </div>
            </div>
</x-app-layout>
