<?php

namespace App\Http\Controllers;

use App\Models\Textbook;

class TextbookController extends Controller
{
    public function index()
    {
        $textbooks = Textbook::latest()->paginate(12);

        return view('textbooks.index', compact('textbooks'));
    }
}
