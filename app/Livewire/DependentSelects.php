<?php

namespace App\Livewire;

use App\Models\Province;
use App\Models\Town;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DependentSelects extends Component
{
    public $provinces;
    public $towns;
    public $selectedProvince;
    public $selectedTown;
    public static $staticTown;

    public function updatedSelectedTown($value)
    {
        DependentSelects::$staticTown = $value;
        $this->dispatch('town_changed', ['town_id' => $value]);
    }

    public function updatedSelectedProvince()
    {
        $this->towns = $this->selectedProvince
            ? Town::where('province_id', $this->selectedProvince)->get()
            : [];
    }

    public function mount()
    {
        $this->selectedProvince = Auth::user()?->userInfo->province_id;
        $this->selectedTown = Auth::user()?->userInfo->town_id;
        $this->provinces = Province::all();
    }

    public function render()
    {
        if ($this->selectedProvince)
            $this->updatedSelectedProvince();
        return view('livewire.dependent-selects');
    }
}
