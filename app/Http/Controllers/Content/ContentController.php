<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Content;
use App\Category;

class ContentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contents= Content::all();
        $categories = Category::all();
        // return view('admin.content.index')->with('contents', $contents);
        return view('content.index')->with(compact('contents', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('content.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'content_name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required'
            ]);         
       
        $content= new Content();
        $content->content_name = $request['content_name'];
        $content->description = $request['description'];
        $content->date = $request['date'];
        $content->time = $request['time'];
        $content->save();

        return redirect('/usercontent')->with('status', 'A New content has been created successfully.');

    }

    public function edit(Request $request, $id)
    {
        $contents = Content::findOrFail($id);
        $categories = Category::all();
        return view('content.edit')->with(compact('contents', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $contents = Content::find($id);
        $contents->content_name = $request->input('content_name');
        $contents->description = $request->input('description');
        $contents->date = $request->input('date');
        $contents->time = $request->input('time');
        $contents->update();

        return redirect('/usercontent')->with('status', 'Content has been updated successfully.');
    }

    public function getdetails(Request $request,$id)
    {
        $contents = Content::findOrFail($id);
        return view('content.details')->with('contents', $contents);
    }

    public function destroy($id)
    {
        $contents = Content::findOrFail($id);
        $contents->delete();

        return redirect('/usercontent')->with('status', 'Content has been deleted successfully.');
    }
    

    public function contentdownload()
    {
        $contents = Content::get(); // All contents
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($contents, ['content_name' => 'Content Name', 'description' => 'Description','date' => 'Date',
         'time' => 'Time', 'created_at' => 'Created Date', 'updated_at' => 'Last Updated'])->download('content list.csv');
    }    
    
}
