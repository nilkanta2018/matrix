<?php
namespace App\Http\Controllers\API;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();

        return response()->json(['blogs' => $blogs]);
    }
}
