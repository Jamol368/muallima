<x-app-layout>

    @section('carousel')
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn mb-4">{{ $code . ' ' . __('messages.error') }}</h1>
                    <h2 class="display-6 text-white animated zoomIn mb-4">{{ $message }}</h2>
                    <a href="{{ route('home') }}" class="h5 text-white">{{ __('messages.home') }}</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a class="h5 text-white">{{ __('messages.error') }}</a>
                </div>
            </div>
        </div>
    @endsection

</x-app-layout>
