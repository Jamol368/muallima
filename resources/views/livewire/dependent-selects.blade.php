<!-- resources/views/livewire/dependent-selects.blade.php -->

<div class="flex gap-1">
    <div class="mt-4 flex-1">
        <label for="province" class="block font-medium text-sm text-gray-700">{{ __('messages.select province') }}:</label>
        <select wire:model.live="selectedProvince" id="province" name="province" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
            <option value="" selected>{{ __('messages.select province') }}</option>

            @if ($provinces)
                @foreach ($provinces as $province)
                    <option value="{{ $province->id }}" > {{ $province->name }}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="mt-4 flex-1">
        <label for="town" class="block font-medium text-sm text-gray-700">{{ __('messages.select town') }}:</label>
        <select wire:model.live="selectedTown" id="town" name="town" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
            <option value="" selected>{{ __('messages.select town') }}</option>
            @if ($towns)
                @foreach ($towns as $town)
                    <option value="{{ $town->id }}">{{ $town->name }}</option>
                @endforeach
            @endif
        </select>
    </div>

</div>
