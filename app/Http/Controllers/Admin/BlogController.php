<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:5000',
            'title' => 'required|max:200',
            'description' => 'required',
            'category' => 'required|numeric'
        ]);

        $imagePath = handleUpload('image' , null , env('BLOG_IMAGE_UPLOAD_PATH'));

        $blog = new Blog();
        $blog->image = $imagePath;
        $blog->title = $request->title;
        $blog->category = $request->category;
        $blog->description = $request->description;
        $blog->save();

        Toastr()->success('Blog Created Successfully','Congrate');
        return redirect()->route('admin.blog.index');

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
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('admin.blog.edit' , compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'image' => 'mimes:png,jpg,jpeg|max:5000',
            'title' => 'required|max:200',
            'description' => 'required',
            'category' => 'required|numeric'
        ]);

        $blog = Blog::findOrFail($id);
        $imagePath = handleUpload('image' , $blog , env('BLOG_IMAGE_UPLOAD_PATH'));


        $blog->image = (!empty($imagePath) ? $imagePath : $blog->image);
        $blog->title = $request->title;
        $blog->category = $request->category;
        $blog->description = $request->description;
        $blog->save();

        Toastr()->success('Blog Updated Successfully','Congrate');
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        deleteFileIfExist(env('BLOG_IMAGE_UPLOAD_PATH').$blog->image);
        $blog->delete();
    }
}
