<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Subject;
use App\Models\Topic;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $subject_id)
    {
        $subject = Subject::findOrFail($subject_id);
        $topics = $subject->topics;

        return view('topic.index', [
            'topics' => $topics,
            'subject' => $subject
        ]);
    }
}
