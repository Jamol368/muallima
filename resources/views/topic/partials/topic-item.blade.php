<div class="topic-item" style="margin-left: {{ $depth * 30 }}px;">
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('topic-result.create', [$subject->id, $topic->id]) }}">
                    {{ $topic->name }}
                </a>
            </h5>
            <p class="card-text">{{ $topic->description }}</p>

            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    Created: {{ $topic->created_at->format('M d, Y') }}
                </small>
            </div>
        </div>
    </div>

    @if($topic->children->count() > 0)
        @foreach($topic->children as $child)
            @include('topics.partials.topic-item', ['topic' => $child, 'depth' => $depth + 1])
        @endforeach
    @endif
</div>
