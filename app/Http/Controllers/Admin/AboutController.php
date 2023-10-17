<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index' , compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'required|max:5000',
            'image' => 'mimes:png,jpg,jpeg|max:5000',
            'resume' => 'mimes:txt,pdf,csv|max:10000'

        ]);
        $about = About::first();
        $imagePath = handleUpload('image',$about,env('ABOUTME_IMAGE_UPLOAD_PATH'));
        $resumePath = handleUpload('resume',$about,env('ABOUTME_RESUME_UPLOAD_PATH'));

        About::updateOrCreate(
            ['id' => $id],
            [
               'title' => $request->title,
               'description' => $request->description,
               'image' => (!empty($imagePath) ? $imagePath : $about->image),
               'resume' => (!empty($resumePath) ? $resumePath : $about->resume)
            ]
        );
        toastr()->success('Your About Me Section Updated Successfully','Congrats');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}