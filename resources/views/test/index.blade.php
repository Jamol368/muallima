<x-app-layout>

    @section('carousel')
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">{{ $test_type->name }}</h1>
                    <a href="{{ route('home') }}" class="h5 text-white">{{ __('messages.home') }}</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a class="h5 text-white">{{ $test_type->name }}</a>
                </div>
            </div>
        </div>
    @endsection

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-9">
                <!-- Tab links -->
                <div class="tab">
                    @foreach($questions as $key => $question)
                        <button id="tablinks-{{ $key+1 }}"
                                class="tablinks {{ $key==0?'active':'' }}">{{ $key+1 }}</button>
                    @endforeach
                </div>

                <form id="test" action="{{ route('test.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="time" value="{{ $test_type->mins }}">
                    @foreach($questions as $key => $question)
                        <!-- Tab content -->
                        <div id="tabcontent-{{ $key+1 }}" class="mt-4 tabcontent hide">
                            <h3 class="h5">{{ $key+1 }}-savol</h3>
                            <p class="fs-5">{{ $question->question }}</p>
                            <hr>
                            <div class="options mb-3">
                                <p class="mt-4 h5 text-white fw-bolder">Variantlar:</p>
                                @foreach($question->answers as $answer_key => $answer)
                                    <div class="option fs-5" style="display: block">
                                        <label for="{{ $answer->id }}">
                                            <b>{{ chr(65+$answer_key) }})</b>
                                            <input id="{{ $answer->id }}" type="radio" name="{{ $key+1 }}"
                                                   value="{{ $answer->id }}"/> {{ $answer->option }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div class="flex justify-content-between mb-3">
                        <a class="btn btn-primary previous">Oldingi</a>
                        <a class="btn btn-primary next">Keyingi</a>
                    </div>
                    <div class="flex justify-content-end">
                        <button id="submit" class="btn btn-danger bg-danger" type="submit">Yakunlash</button>
                    </div>
                </form>
                </div>
                <div class="col-md-3">
                    <p id="timer">00:00</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Start -->

    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            background-color: #b31818;
            color: #fff;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            width: 50px;
            margin: 2px 2px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ddd;
        }

        /* Create an checked tablink class */
        .tab button.checked {
            background-color: #007d08;
        }

        /* Style the tab content */
        .tabcontent {
            padding: 6px 12px;
        }

        .hide {
            display: none;
        }

        .show {
            display: block;
        }
    </style>

</x-app-layout>
