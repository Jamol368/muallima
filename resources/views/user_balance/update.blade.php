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
    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <h2 class="h3">{{ __('messages.user balance') }}</h2>

                        <div class="user-id flex">
                            <p class="flex-grow-0 w-120 fw-500">User ID:</p>
                            <p class="flex-auto">{{ $userBalance->user_id }}</p>
                        </div>
                        <div class="user-balance flex">
                            <p class="flex-grow-0 w-120 fw-500">{{ __('messages.balance') }}:</p>
                            <p class="flex-auto">{{ $userBalance->balance }}</p>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3" />
                    <br>
                    <div class="row">
                        <img src="{{ asset('img/click-white.jpg') }}" alt="click.uz" class="click-logo">
                        <form action="{{ route('user-balance.update') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <input type="number" name="amount" class="form-control border-0 bg-light px-4" value="1000" style="height: 55px;" min="1000">
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
