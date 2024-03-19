<div>
    <label class="block font-medium text-sm text-gray-700">{{ __('messages.phone') }}</label>
    <div class="flex items-center gap-1">
            <div class="relative w-1/2">
                <select id="code" name="code" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                    <option value="33" selected>+99833</option>
                    <option value="88">+99888</option>
                    <option value="90">+99890</option>
                    <option value="91">+99891</option>
                    <option value="93">+99893</option>
                    <option value="94">+99894</option>
                    <option value="95">+99895</option>
                    <option value="97">+99897</option>
                    <option value="98">+99898</option>
                    <option value="99">+99899</option>
                </select>
            </div>
            <div class="relative w-full">
                <x-input type="tel" id="phone-input" name="phone" :value="old('phone')" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" pattern="[0-9]{7}" placeholder="#######" required />
            </div>
        </div>
</div>
