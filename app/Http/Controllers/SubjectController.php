<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\TestType;

class SubjectController extends Controller
{
    public function index($test_type_id)
    {
        $test_type = TestType::with(['subjects' => function($query) {
            $query->withCount('topics');
        }])->find($test_type_id);

        $subjects = $test_type->subjects;

        return view('subjects.index', [
            'subjects' => $subjects,
            'test_type' => $test_type,
        ]);
    }

    public function degree($subject_id)
    {
        $subject = Subject::query()->find($subject_id);

        return view('subjects.degree', [
            'subject' => $subject,
        ]);
    }
}
