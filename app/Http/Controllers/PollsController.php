<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\logger;
use Illuminate\Http\Request;
use App\Models\Polls;
use Exception;
use Illuminate\Support\Facades\Auth;

class PollsController extends Controller {
    public function index(Request $request) {
        $selectedCategory = $request->input('category');
        $polls = Polls::query();
        if ($selectedCategory) {
            $polls->where('category', $selectedCategory);
        }
        $polls = $polls->get();
        $categories = Polls::distinct()->pluck('category');

        return view('welcome', [ 'categories' => $categories, 'polls' => $polls ]);
    }

    public function create(Request $request) {
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
                'data' => $poll,
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

    public function show($id) {
       try {
        $poll = Polls::findOrFail($id);
        return view('poll', ['poll' => $poll]);
       } catch (Exception $e) {
        return redirect()->route('home')->with('error', 'Poll not found.');
       }
    }

    public function update(Request $request) {
       $id = $request->input('pollId');
       $optionsData = $request->input('optionsData');

       try {
           Polls::where('id', $id)
            ->update([
                'options' => $optionsData,
            ]);

            return response()->json([
                'status' => true,
                'data' => '',
                'message' => 'Poll updated successfully'
            ], 200);
       } catch (Exception $e) {
        return response()->json([
            'status' => false,
            'data' => null,
            'message' => $e->getMessage(),
        ], 500);
       }
    }

    public function destroy($id) {
       try {
            Polls::findOrFail($id)->delete();

            return response()->json([
                'status'=> true,
                'data'=> '',
                'message'=> 'poll deleted successfully'
            ], 200);
       } catch (Exception $e) {
            return response()->json([
                'status'=> false,
                'data'=> null,
                'message'=> $e->getMessage(),
            ], 500);
       }
    }

}
