<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;

class JobPostController extends Controller
{
    public function index()
    {
        $jobPosts = JobPost::all();
        return view('articles.career', [
            'jobPosts' => $jobPosts,
        ]);
    }

    public function detail($id)
    {
        $jobPost = JobPost::findOrFail($id);
        return view('articles.career_detail', [
            'jobPost' => $jobPost,
        ]);
    }
}
