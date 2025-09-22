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
                    <div class="profile-card">
                        <h1 class="h2 text-center">Mening natijalarim</h1>
                        <div class="container py-5">
                            <div class="row g-5">
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

                    <div class="col-sm-3">
                        <ul class="">
                            <li class="profile-links {{ request()->routeIs('user-balance.edit') ? 'active' : '' }}">
                                <a href="{{ route('user-balance.edit') }}" class=""><i
                                        class="fas fa-user-circle me-2"></i>
                                    Profile</a>
                            </li>
                            <li class="profile-links {{ request()->routeIs('result.index') ? 'active' : '' }}">
                                <a href="{{ route('result.index') }}" class=""><i class="fas fa-line-chart me-2"></i>
                                    Mening
                                    natijalarim</a>
                            </li>
                            <li class="profile-links {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                                <a href="{{ route('profile.edit', ['user_id' => Auth::id()]) }}" class=""><i class="fas fa-line-chart me-2"></i> Sozlamalar</a>
                            </li>
                            <li class="profile-links">
                                <form method="POST" id="logout" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"><i
                                            class="fas fa-sign-out me-2"></i>{{ __('messages.log out') }}
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
</x-app-layout>
