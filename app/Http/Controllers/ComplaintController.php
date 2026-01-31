<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'test_id' => 'required|exists:tests,id',
            'description' => 'required|string|max:1023',
        ]);

        Complaint::create([
            'user_id' => auth()->id(),
            'test_id' => $data['test_id'],
            'description' => $data['description'],
        ]);

        return response()->json(['success' => true]);
    }
}
