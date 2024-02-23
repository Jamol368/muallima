<div class="mt-4">
    <div class="mt-4">
        <label for="teacher-category" class="block font-medium text-sm text-gray-700">{{ __('messages.select teacher type') }}:</label>
        <select wire:model="selectedTeacherType" id="teacher-category" name="teacher_category" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
            <option value="" selected disabled>{{ __('messages.select teacher type') }}</option>
            @if ($teacher_types)
                @foreach ($teacher_types as $teacher_type)
                    <option value="{{ $teacher_type->id }}">{{ $teacher_type->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="mt-4">
        <label for="subject" class="block font-medium text-sm text-gray-700">{{ __('messages.select subject') }}:</label>
        <select wire:model="selectedSubject" id="subject" name="subject" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
            <option value="" selected disabled>{{ __('messages.select subject') }}</option>
            @if ($subjects)
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
