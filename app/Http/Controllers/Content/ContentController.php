<?php

namespace App\Http\Controllers\Content;

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
        $this->middleware('auth');
    }

    public function index()
    {
        $contents= Content::all();
        // return view('admin.content.index')->with('contents', $contents);
        return view('content.index')->with('contents', $contents);
    }


    public function create()
    {
        return view('content.create');
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
        return view('content.edit')->with('contents', $contents);
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
        $csvExporter->build($contents, ['content_name', 'description','date', 'time', 'created_at', 'updated_at'])->download('content list.csv');
    }    
    
}