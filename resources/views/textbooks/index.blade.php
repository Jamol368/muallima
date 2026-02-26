<x-app-layout>

    @section('carousel')
        <div class="container-fluid bg-green py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">{{ __('messages.textbooks') }}</h1>
                    <a href="{{ route('home') }}" class="h5 text-white">{{ __('messages.home') }}</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a class="h5 text-white">{{ __('messages.textbooks') }}</a>
                </div>
            </div>
        </div>
    @endsection

    <!-- Blog Start -->
    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="flex flex-col flex-wrap justify-content-center h-full gap-4 bg-white rounded-xl shadow-md">
                @foreach($textbooks as $book)
                    <div
                        class="textbook border border-gray-100 shadow hover:shadow-lg rounded-3">
                        <div class="p-6 flex-grow relative">
                            <div
                                class="flex items-center justify-center w-12 h-12 bg-blue-100 text-blue-600 rounded-lg mb-4">
                                <h3 class="fs-4 text-center text-break wor overflow-hidden">{{ $book->name }}</h3>
                            </div>
                            <p>{{ $book->description }}</p>

                            <div class="mt-4 flex items-center justify-between justify-content-end relative bottom-0">
                                <a href="{{ Storage::url($book->file) }}"
                                   target="_blank"
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md hover:bg-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </a>

                                <a href="{{ Storage::url($book->file) }}"
                                   download
                                   class="text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $textbooks->links() }}
            </div>
        </div>
    </div>
    <!-- Blog Start -->

</x-app-layout>
