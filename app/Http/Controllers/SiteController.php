<?php

namespace App\Http\Controllers;

use App\Enums\TestTypeEnum;
use App\Models\Post;
use App\Models\Subject;
use App\Models\Test;
use App\Models\TestType;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'users' => User::all()->count(),
            'tests' => Test::all()->count(),
            'subjects' => Subject::all()->count(),
            'subject_models' => Subject::all()->sortBy('order'),
            'posts' => Post::latest()->take(3)->get(),
            'topic_test_type' => TestType::query()->where('id', TestTypeEnum::TEST_TYPE_TOPIC)->first(),
        ]);
    }
}
