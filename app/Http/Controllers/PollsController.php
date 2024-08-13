<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Polls;

class PollsController extends Controller
{
    public function getCatagories(Request $request) {
        $selectedCategory = $request->input('category');
        $polls = Polls::query();
        if ($selectedCategory) {
            $polls->where('category', $selectedCategory);
        }
        $polls = $polls->get();
        $categories = Polls::distinct()->pluck('category');

        return view('welcome', [ 'categories' => $categories, 'polls' => $polls ]);
    }
}
