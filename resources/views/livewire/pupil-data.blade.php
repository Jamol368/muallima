<div class="mt-4">
    <div class="mt-4" wire:pool.2s>
        <label for="school" class="block font-medium text-sm text-gray-700">{{ __('messages.select the school') }}:</label>
        <select wire:model="selectedSchool" id="school" name="school" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
            <option value="" selected disabled>{{ __('messages.select the school') }}</option>
            @if ($schools)
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="mt-4">
        <label for="pupil-grade" class="block font-medium text-sm text-gray-700">{{ __('messages.select pupil grade') }}:</label>
        <select wire:model="selectedPupilGrade" id="pupil-grade" name="pupil_grade" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
            <option value="1" selected>1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>

</div>
