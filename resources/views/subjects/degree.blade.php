<x-app-layout>

    <div id="subject" class="container-fluid py-5 wow fadeInUp mt-lg-5" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto">
                <h1 class="fw-bold text-green text-uppercase fz-22">Sinf va qismni yoki Aralash testni tanlang</h1>
                <h5 class="mb-0">{{ $subject->name }} fanidan mavzulashtirilgan test</h5>
            </div>

            <div class="container mx-auto mb-5 max-w-md p-6 bg-white shadow-lg rounded-3">
                <form id="subject-degree" action="{{ route('natural-science.result.create') }}" method="get" class="space-y-6">
                    @csrf
                    @method('GET')

                    <input type="hidden" name="subject_id" value="{{ $subject->id }}">

                    <div>
                        <h2 class="text-lg font-semibold mb-3">Sinfni tanlang</h2>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach($degrees as $degree)
                                <label class="flex items-center justify-center border rounded-lg py-3 cursor-pointer hover:bg-indigo-50">
                                    <input type="radio" name="degree" value="{{ $degree }}" class="hidden peer">
                                    <span class="peer-checked:text-white peer-checked:bg-indigo-600 px-4 py-2 rounded transition">
                                        {{ $degree }} - sinf uchun
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold mb-3 mt-6">Qismni tanlang</h2>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach($parts as $part)
                            <label class="flex items-center justify-center border rounded-lg py-3 cursor-pointer hover:bg-indigo-50">
                                <input type="radio" name="part" value="{{ $part }}" class="hidden peer">
                                <span class="peer-checked:text-white peer-checked:bg-indigo-600 px-4 py-2 rounded transition">{{ $part }} - qism</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit"
                                class="btn btn-success px-5 py-2 bg-success font-medium rounded-lg hover:bg-indigo-700 transition">
                            Tanlash
                        </button>
                    </div>
                </form>
            </div>

            <div class="container mx-auto mt-5 max-w-md p-6 bg-white shadow-lg rounded-3">
                <div class="mixed-quiz flex justify-content-between">
                    <h2>{{ $subject->name }} fani bo'yicha aralash testlar</h2>
                    <a href="{{ route('mixed.test.create', ['subject_id' => $subject->id]) }}" class="btn btn-success px-5 py-2 bg-success font-medium rounded-lg hover:bg-indigo-700 transition">Tanlash</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("subject-degree");
            const button = form.querySelector("button[type=submit]");
            const radios = form.querySelectorAll("input[type=radio]");

            function checkRadios() {
                const degree = form.querySelector("input[name=degree]:checked");
                const part   = form.querySelector("input[name=part]:checked");
                if (degree && part) {
                    button.disabled = false;
                    button.classList.remove("bg-gray-300","text-gray-500","cursor-not-allowed");
                    button.classList.add("bg-indigo-600","text-white","hover:bg-indigo-700");
                } else {
                    button.disabled = true;
                    button.classList.add("bg-gray-300","text-gray-500","cursor-not-allowed");
                    button.classList.remove("bg-indigo-600","text-white","hover:bg-indigo-700");
                }
            }

            radios.forEach(r => r.addEventListener("change", checkRadios));
            checkRadios();
        });
    </script>

</x-app-layout>
