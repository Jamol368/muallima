<div class="topic-item" style="margin-left: {{ $depth * 30 }}px;">
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">
                @if($topic->children->isNotEmpty())
                    <p>
                        {{ $topic->name }}
                    </p>
                @else
                    <a href="{{ route('topic-result.create', ['subject' => $subject->id, 'topic' => $topic->id]) }}">
                        {{ $topic->name }}
                    </a>
                @endif
            </h5>
            <p class="card-text">{{ $topic->description }}</p>
        </div>
    </div>

    @if($topic->children->count() > 0)
        @foreach($topic->children as $child)
            @include('topics.partials.topic-item', ['topic' => $child, 'depth' => $depth + 1])
        @endforeach
    @endif
</div>
