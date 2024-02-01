<!-- resources/views/livewire/dependent-selects.blade.php -->

<div>
    <h1>Toifangizni tanlang:</h1>
    @if($types)
        @foreach($types as $type)
            <label class="block">
                {{ $type->name }} <input type="radio" name="type" wire:model.live="selectedType" value="{{ $type->id }}" required>
            </label>
        @endforeach
    @endif

    @if($selectedType == 1)
        <livewire:teacher-type-select />
    @elseif($selectedType == 2)
        <livewire:pupil-data :town_id="$town_id" />
    @endif

</div>
