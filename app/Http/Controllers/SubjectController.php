<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function topicSubjects()
    {
        return view('subjects/for-topic', [
            'subject_models' => Subject::all()->sortBy('order'),
        ]);
    }
}
