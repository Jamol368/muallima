<x-app-layout>
    <style>
        .card-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 1200px;
            width: 100%;
        }

        .card {
            border-radius: 16px;
            padding: 20px;
            color: #e6e6e6;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .icon {
            margin-bottom: 15px;
        }

        .icon img {
            width: 50%;
            margin: 2px auto;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .subject-btn {
            background: rgba(255, 255, 255, 0.3);
            border: none;
            padding: 10px 20px;
            border-radius: 12px;
            color: #fff;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.2s;
            font-size: 18px;
        }

        .subject-btn:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .info {
            display: flex;
            justify-content: space-around;
            margin-top: 15px;
            font-size: 14px;
            width: 100%;
        }

        .info span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        @media (max-width: 992px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
                padding: 15px;
            }

            .card {
                min-height: 180px;
                padding: 15px;
            }
        }

        @media (max-width: 768px) {
            .card-container {
                grid-template-columns: 1fr;
                gap: 12px;
                padding: 12px;
                max-width: 100%;
            }

            .card {
                min-height: auto;
                margin: 0;
                border-radius: 12px;
                width: 100%;
                padding: 20px 15px;
            }

            .card:hover {
                transform: translateY(0px);
            }
        }
    </style>

    <div id="subject" class="container-fluid py-5 wow fadeInUp mt-lg-5" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto">
                <h5 class="fw-bold text-green text-uppercase fz-22">{{ __('messages.test') }}</h5>
                <h1 class="mb-0">{{ $test_type->name }} uchun fanni tanlang!</h1>
            </div>
            <div class="card-container">
                @foreach($subjects as $subject)
                    @php
                        if ($subject->id == \App\Enums\SubjectEnum::NATURAL_SCIENCE->value || $subject->id == \App\Enums\SubjectEnum::Reading->value) {
                            $url = route('subject.degree', ['subject_id' => $subject->id]);
                        } elseif ($test_type->id == \App\Enums\TestTypeEnum::TEST_TYPE_TOPIC->value) {
                            $url = route('topics.index', ['subject_id' => $subject->id]);
                        } else {
                            $url = route('result.create', ['test_type' => $test_type->id, 'subject' => $subject->id]);
                        }
                    @endphp
                    <div class="card col-sm-12"
                         style="background: linear-gradient(135deg, {{ $subject->color }}, {{ $subject->color_to }});">
                        <div class="icon"><img src="{{ asset('storage/' . $subject->img) }}" alt="{{ $subject->img }}"></div>
                        <div class="title">{{ $subject->name }}</div>
                        <a class="subject-btn"
                           href="{{ $url  }}">
                            Boshlash
                        </a>
                        <div class="info">
                            <span><i class="fas fa-book"></i> {{ $test_type->questions }} savol</span>
                            <span><i class="fas fa-clock"></i> {{ $test_type->mins }} min</span>
                            <span><i class="fas fa-money-bill-alt"></i> {{ $test_type->price }} so'm</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
