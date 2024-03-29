<?php

namespace App\Livewire;

use App\Models\School;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;

class PupilData extends Component
{
    public $schools;
    public $town_id = 5;
    public $userTown;
    public $selectedSchool;
    public $selectedPupilGrade;

    #[On('town_changed')]
    public function town_changed($value)
    {
        $this->town_id = $value;
    }

    public function render()
    {
        $this->schools = School::where(['town_id' => $this->town_id])
            ->orWhere(['town_id' => $this->userTown])
            ->get();

        return view('livewire.pupil-data');
    }
}
