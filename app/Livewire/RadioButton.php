<?php

namespace App\Livewire;

use App\Models\UserType;
use Livewire\Attributes\On;
use Livewire\Component;

class RadioButton extends Component
{
    public $types;

    public $town_id;

    public $selectedType = null;

    public function updatedSelectedType($value): void
    {
//        dd(DependentSelects::$staticTown);
        $this->dispatch('type_changed', ['value' => $value]);
    }

    #[On('town_changed')]
    public function town_changed($value)
    {
        $this->town_id = $value;
    }

    public function render()
    {
        $this->types = UserType::all();

        return view('livewire.radio-button');
    }
}
