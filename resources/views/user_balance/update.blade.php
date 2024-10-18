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
                <div class="col-sm-9">
                    <div class="row">
                        <img src="{{ asset('/img/avatar-default-icon.png') }}" class="col-sm-3"  alt=""/>
                        <div class="col-sm-9">
                            <h2 class="h2">{{ $user['name'] }}</h2>

                            <div class="user-balance flex fs-5 mb-1">
                                <p class="flex-grow-0 fw-500 mr-2">{{ __('messages.balance') }}:</p>
                                <p class="flex-auto text-info">{{ $user['user_balance']['balance'] }} so'm</p>
                            </div>
                            <div class="user-id flex fs-5 mb-1">
                                <p class="flex-grow-0 fw-500 mr-2">User ID:</p>
                                <p class="flex-auto">{{ $user['id'] }}</p>
                            </div>
                            <div class="user-phone flex fs-5 mb-1">
                                <p class="flex-grow-0 fw-500 mr-2">{{ trans('messages.phone') }}:</p>
                                <p class="flex-auto">{{ $user['phone'] }}</p>
                            </div>
                            <div class="user-province flex mb-1">
                                <p class="flex-grow-0 mr-2">{{ trans('filament.province') }}: </p>
                                <p class="flex-auto">{{ $user['user_info']['province']['name'] }}</p>
                            </div>
                            <div class="user-town flex mb-1">
                                <p class="flex-grow-0 mr-2">{{ trans('filament.town') }}: </p>
                                <p class="flex-auto">{{ $user['user_info']['town']['name'] }}</p>
                            </div>

                            @if(isset($teacher))
                                <div class="user-subject flex mb-1">
                                    <p class="flex-grow-0 mr-2">{{ trans('filament.subject') }}: </p>
                                    <p class="flex-auto">{{ $teacher['subject']['name'] }}</p>
                                </div>
                                <div class="user-category flex mb-1">
                                    <p class="flex-grow-0 mr-2">{{ trans('filament.teacher category') }}: </p>
                                    <p class="flex-auto">{{ $teacher['teacher_category']['name'] }}</p>
                                </div>
                            @endif

                            @if(isset($pupil))
                                <div class="user-school flex mb-1">
                                    <p class="flex-grow-0 mr-2">{{ trans('messages.school') }}:</p>
                                    <p class="flex-auto">{{ $teacher['school']['name'] }}</p>
                                </div>
                                <div class="user-school-grade flex mb-1">
                                    <p class="flex-grow-0 mr-2">{{ trans('messages.school grade') }}:</p>
                                    <p class="flex-auto">{{ $teacher['school_grade']['name'] }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr class="mt-3 mb-3" />
                    <br>
                    <div class="row">
                        <h3 class="h3">Hisobni to'ldirish</h3>
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

                <div class="col-sm-3">
                    <ul class="">
                        <li class="profile-links {{ request()->routeIs('user-balance.edit') ? 'active' : '' }}">
                            <a href="{{ route('user-balance.edit') }}" class=""><i class="fas fa-user-circle me-2"></i> Profile</a>
                        </li>
                        <li class="profile-links {{ request()->routeIs('result.index') ? 'active' : '' }}">
                            <a href="{{ route('result.index') }}" class=""><i class="fas fa-line-chart me-2"></i> Mening natijalarim</a>
                        </li>
                        <li class="profile-links">
                            <form method="POST" id="logout" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"><i class="fas fa-sign-out me-2"></i>{{ __('messages.log out') }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Start -->

</x-app-layout>
