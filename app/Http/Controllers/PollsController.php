<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Polls;

class PollsController extends Controller
{
    public function getCatagories() {
        $polls = Polls::all();
        $categories = [];
        foreach ($polls as $poll) {
            if (!in_array($poll['category'], $categories)) {
                $categories[] = $poll['category'];
            }
        }

        return view('welcome', [ 'categories' => $categories, 'polls' => $polls ]);
    }
}
