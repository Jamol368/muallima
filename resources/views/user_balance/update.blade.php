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

    <!-- Blog Start -->
    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <h2 class="h3">{{ __('messages.profile info') }}</h2>

                        <div class="user-id flex">
                            <p class="flex-grow-0 w-120 fw-500">{{ trans('messages.name') }}</p>
                            <p class="flex-auto">{{ $user['name'] }}</p>
                        </div>
                        <div class="user-balance flex">
                            <p class="flex-grow-0 w-120 fw-500">{{ trans('messages.surname') }}:</p>
                            <p class="flex-auto">{{ $user['surname'] }}</p>
                        </div>
                        <div class="user-balance flex">
                            <p class="flex-grow-0 w-120 fw-500">{{ trans('messages.middle name') }}:</p>
                            <p class="flex-auto">{{ $user['middle_name'] }}</p>
                        </div>
                        <div class="user-balance flex">
                            <p class="flex-grow-0 w-120 fw-500">{{ trans('filament.province') }}:</p>
                            <p class="flex-auto">{{ $user['user_info']['province']['name'] }}</p>
                        </div>
                        <div class="user-balance flex">
                            <p class="flex-grow-0 w-120 fw-500">{{ trans('filament.town') }}:</p>
                            <p class="flex-auto">{{ $user['user_info']['town']['name'] }}</p>
                        </div>

                        @if(isset($teacher))
                            <div class="user-balance flex">
                                <p class="flex-grow-0 w-120 fw-500">{{ trans('filament.subject') }}:</p>
                                <p class="flex-auto">{{ $teacher['subject']['name'] }}</p>
                            </div>
                            <div class="user-balance flex">
                                <p class="flex-grow-0 w-120 fw-500">{{ trans('filament.teacher category') }}:</p>
                                <p class="flex-auto">{{ $teacher['teacher_category']['name'] }}</p>
                            </div>
                        @endif

                        @if(isset($pupil))
                            <div class="user-balance flex">
                                <p class="flex-grow-0 w-120 fw-500">{{ trans('messages.school') }}:</p>
                                <p class="flex-auto">{{ $teacher['school']['name'] }}</p>
                            </div>
                            <div class="user-balance flex">
                                <p class="flex-grow-0 w-120 fw-500">{{ trans('messages.school grade') }}:</p>
                                <p class="flex-auto">{{ $teacher['school_grade']['name'] }}</p>
                            </div>
                        @endif
                    </div>
                    <hr class="mt-3 mb-3" />
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Start -->

    <!-- Blog Start -->
    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <h2 class="h3">{{ __('messages.user balance') }}</h2>

                        <div class="user-id flex">
                            <p class="flex-grow-0 w-120 fw-500">User ID:</p>
                            <p class="flex-auto">{{ $user['id'] }}</p>
                        </div>
                        <div class="user-balance flex">
                            <p class="flex-grow-0 w-120 fw-500">{{ __('messages.balance') }}:</p>
                            <p class="flex-auto">{{ $user['user_balance']['balance'] }}</p>
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
