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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="profile-card">
                        <h1 class="h2 text-center">Sozlamalar</h1>
                        <div class="profile-card">
                            <h3 class="h3">Hisobni tahrirlash</h3>
                            <form action="{{ route('profile.update') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="row g-3">
                                    <label for="name">FIO</label>
                                    <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control border-0 bg-light px-4"
                                           style="height: 55px;">
                                    <label for="subject_id">Fan</label>
                                    <select name="subject_id" id="subject_id" class="form-control border-0 bg-light py-3">
                                        <option value="{{ $user->subject_id }}" selected>{{ $user->subject->name }}</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="teacher_category_id">Malaka (amaldagi) toifa</label>
                                    <select name="teacher_category_id" id="teacher_category_id" class="form-control border-0 bg-light py-3">
                                        <option value="{{ $user->teacher_category_id }}" selected>{{ $user->teacherCategory->name }}</option>
                                        @foreach($teacher_categories as $teacher_category)
                                            <option value="{{ $teacher_category->id }}">{{ $teacher_category->name }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-success bg-success py-3" type="submit">Saqlash</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <x-profile-sidebar :user="$user" />
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
