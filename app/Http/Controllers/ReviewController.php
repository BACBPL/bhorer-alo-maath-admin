<?php

namespace App\Http\Controllers;

use App\Models\Review;

class ReviewController extends Controller
{
    public function reviews()
    {
        $reviews = Review::with(['user', 'booking'])->get();

         return view('admin.reviews.index', compact('reviews'));
    }
}