<!-- resources/views/livewire/filament-login.blade.php -->

<div>
    <form wire:submit.prevent="login">
        <div>
            <label for="phone">Phone:</label>
            <input type="tel" wire:model.defer="phone" />
            @error('phone') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" wire:model.defer="password" />
            @error('password') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</div>
