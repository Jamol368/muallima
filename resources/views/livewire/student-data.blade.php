<div>
    <div>
        <x-label for="university" value="{{ __('University') }}" />
        <x-input id="university" class="block mt-1 w-full" type="text" name="university" :value="old('university')" required autocomplete="university" />
    </div>

    <div>
        <label for="university-grade" class="block font-medium text-sm text-gray-700">Selecte the university grade:</label>
        <select wire:model="selectedUniversityGrade" id="university-grade" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
            <option value="1" selected>1</option>
            <option value="2" selected>2</option>
            <option value="3" selected>3</option>
            <option value="4" selected>4</option>
            <option value="5" selected>4</option>
        </select>
    </div>

</div>
