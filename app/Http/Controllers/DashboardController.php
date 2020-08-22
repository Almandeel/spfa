<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\News;
use App\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:dashboard-read')->only(['index']);
    }
    
    
    public function index()
    {
        $members = User::where('id', '!=', 1)->where('status', 1)->get();
        $dont_members = User::where('id', '!=', 1)->where('status', 0)->get();
        $news = News::all();
        $courses = Course::all();
        return view('dashboard.index', compact('members', 'dont_members', 'news', 'courses'));
    }
}
