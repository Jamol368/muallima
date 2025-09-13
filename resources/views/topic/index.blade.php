<x-app-layout>

    <div class="container">
        <h2>{{ $subject->name }} fanidan mavzulashtirilgan test ishlash</h2>

        @if($topics->count() > 0)
            <div class="topics-tree">
                @foreach($topics as $topic)
                    @include('topics.partials.topic-item', ['topic' => $topic, 'depth' => 0])
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                Mavzular topilmadi.
            </div>
        @endif
    </div>

</x-app-layout>
