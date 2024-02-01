<?php

namespace App\Http\Controllers;
use App\Models\Childpicked;
use Illuminate\Http\Request;

class ChildPickedController extends Controller
{
    public function index()
    {
        $childlist = Childpicked::get();
        return view('backend/child/listing', compact('childlist'));
    } 

    public function child_add()
    {
        return view('backend/child/create');
    }
}
