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
                    <div class="profile-card">
                        <h1 class="h2 text-center">Profil</h1>
                        <h3 class="h3">{{ $user['name'] }}</h3>
                        <div class="profile-info">
                            <h4 class="flex-grow-0">{{ __('messages.balance') }}:</h4>
                            <p class="flex-auto text-danger">{{ $user['user_balance']['balance'] }} so'm</p>
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
                            <h4 class="flex-grow-0">{{ trans('filament.teacher category') }}: </h4>
                            <p class="flex-auto">{{ $user['teacher_category']['name'] }}</p>
                        </div>
                    </div>

                    <div class="profile-card">
                        <h3 class="h3">Hisobni to'ldirish</h3>
                        <img src="{{ asset('img/click-white.jpg') }}" alt="click.uz" class="click-logo">
                        <form action="{{ route('user-balance.update') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <input type="number" name="amount" class="form-control border-0 bg-light px-4"
                                           value="1000" style="height: 55px;" min="1000">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-info w-100 py-3" type="submit">To'ldirish</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-sm-3">
                    <ul class="">
                        <li class="profile-links {{ request()->routeIs('user-balance.edit') ? 'active' : '' }}">
                            <a href="{{ route('user-balance.edit') }}" class=""><i class="fas fa-user-circle me-2"></i>
                                Profile</a>
                        </li>
                        <li class="profile-links {{ request()->routeIs('result.index') ? 'active' : '' }}">
                            <a href="{{ route('result.index') }}" class=""><i class="fas fa-line-chart me-2"></i> Mening
                                natijalarim</a>
                        </li>
                        <li class="profile-links">
                            <form method="POST" id="logout" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"><i class="fas fa-sign-out me-2"></i>{{ __('messages.log out') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Start -->

</x-app-layout>
