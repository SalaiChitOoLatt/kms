<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Content;

class ContentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        // $contents= Content::all();
        // return view('admin.content.index')->with('contents', $contents);
        return view('admin.content.index');
    }

    
    public function downloadcsv()
    {
        $contents = Content::get(); // All users
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($contents, ['Content Name', 'Description'])->download('content list.csv');
    }

    
    
}
