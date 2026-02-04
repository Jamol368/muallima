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

    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="profile-card mx-auto max-w-md p-6 bg-white shadow-lg rounded-3">
                        <h1 class="h2 text-center mt-3">Profil</h1>
                        <h3 class="h3">{{ $user['name'] }}</h3>
                        <div class="profile-info">
                            <h4 class="flex-grow-0">{{ __('messages.balance') }}:</h4>
                            <p class="flex-auto text-danger">{{ $user['user_balance']['balance'] }}</p>
                        </div>
                        <div class="profile-info">
                            <h4 class="flex-grow-0">User ID:</h4>
                            <p class="flex-auto">{{ $user['id'] }}</p>
                        </div>
                        <div class="profile-info">
                            <h4 class="flex-grow-0">{{ trans('messages.phone') }}:</h4>
                            <p class="flex-auto">{{ $user['phone'] }}</p>
                        </div>
                        <div class="profile-info">
                            <h4 class="flex-grow-0">{{ trans('filament.subject') }}: </h4>
                            <p class="flex-auto">{{ $user['subject']['name'] }}</p>
                        </div>
                        <div class="profile-info">
                            <h4 class="flex-grow-0">{{ trans('filament.teacher_category') }}: </h4>
                            <p class="flex-auto">{{ $user['teacher_category']['name'] }}</p>
                        </div>
                    </div>

                    <div class="profile-card mx-auto max-w-md p-6 bg-white shadow-lg rounded-3">
                        <h3 class="h3">Hisobni to'ldirish</h3>
                        <img src="{{ asset('img/click-white.jpg') }}" alt="click.uz" class="click-logo">
                        <form action="{{ route('user-balance.update') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <input type="number" name="amount" class="form-control border-0 bg-light px-4"
                                           value="5000" style="height: 55px;" min="5000">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success bg-success w-100 py-3" type="submit">To'ldirish</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-sm-3">
                    <x-profile-sidebar :user="$user" />
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Start -->

</x-app-layout>
