<x-app-layout>

    @section('carousel')
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">{{ __('messages.user balance') }}</h1>
                    <a href="{{ route('home') }}" class="h5 text-white">{{ __('messages.home') }}</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a class="h5 text-white">{{ __('messages.user balance') }}</a>
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
                        <h2 class="h2">{{ __('messages.user balance') }}</h2>

                        <div class="col-md-3">User ID:</div>
                        <div class="col-md-9">{{ $userBalance->user_id }}</div>
                        <div class="col-md-3">{{ __('messages.balance') }}:</div>
                        <div class="col-md-9">{{ $userBalance->balance }}</div>
                    </div>
                    <hr class="mt-3 mb-3" />
                    <br>
                    <div class="row g-5">
                        <h3 class="h3">Hisobni to'ldirish (Click orqali)</h3>
                        <form action="{{ route('user-balance.update') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <input type="number" name="amount" class="form-control border-0 bg-light px-4" value="10000" style="height: 55px;" min="10000">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-info w-100 py-3" type="submit">To'ldirish</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Start -->

</x-app-layout>
