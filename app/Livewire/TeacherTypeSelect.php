<?php

namespace App\Livewire;

use App\Models\Subject;
use App\Models\TeacherCategory;
use Livewire\Component;

class TeacherTypeSelect extends Component
{
    public $teacher_types;
    public $subjects;

    public $selectedTeacherType;
    public $selectedSubject;

    public function render()
    {
        $this->teacher_types = TeacherCategory::all();
        $this->subjects = Subject::all();

        return view('livewire.teacher-type-select');
    }
}
