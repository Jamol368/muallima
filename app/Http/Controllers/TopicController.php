<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subject = Subject::with([
            'topics' => function ($query) use ($request) {
                $query->where('degree', $request->degree)
                    ->where('part', $request->part)
                    ->whereNull('parent_id')
                    ->with('children');
            }
        ])->findOrFail($request->subject_id);

        $topics = $subject->topics;

        return view('topics.index', [
            'topics'  => $topics,
            'subject' => $subject,
        ]);
    }
}
