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
        $contents= Content::all();
        // return view('admin.content.index')->with('contents', $contents);
        return view('admin.content.index')->with('contents', $contents);
    }

    public function destroy($id)
    {
        $contents = Content::findOrFail($id);
        $contents->delete();

        return redirect('/content')->with('status', 'Content has been deleted successfully.');
    }
    
    public function downloadcsv()
    {
        $contents = Content::get(); // All contents
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($contents, ['content_name' => 'Content Name', 'description' => 'Description','date' => 'Date',
        'time' => 'Time', 'created_at' => 'Created Date', 'updated_at' => 'Last Updated'])->download('content list.csv');
    
    }
    
}
