<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Polls;
use Exception;

class PollsController extends Controller {
    public function getPolls(Request $request) {
        $selectedCategory = $request->input('category');
        $polls = Polls::query();
        if ($selectedCategory) {
            $polls->where('category', $selectedCategory);
        }
        $polls = $polls->get();
        $categories = Polls::distinct()->pluck('category');

        return view('welcome', [ 'categories' => $categories, 'polls' => $polls ]);
    }

    public function addPoll(Request $request) {
        $question = $request->input('question');
        $description = $request->input('description');
        $category = $request->input('category');
        $options = $request->input('options');
        $status = $request->input('status');

        $options = $options ? explode(',', $options) : [];
        $options = array_map(function($option) {
           return ["votes" => 0, "option" => $option];
        }, $options);

        try {
            $poll = Polls::create([
                'question' => $question,
                'description' => $description,
                'category' => $category,
                'options' => $options,
                'status' => $status,
                'totalVoters' => 0,
            ]);
    
            return response()->json([
                'status' => true,
                'data' => '',
                'message' => 'Poll added successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => $e->getMessage(),
            ], 500);
        }

    }
}
