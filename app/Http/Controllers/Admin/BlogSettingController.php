<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogSetting;
use Illuminate\Http\Request;

class BlogSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogSetting = BlogSetting::first();
        return view('admin.blog-setting.index',compact('blogSetting'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:200',
            'sub_title' => 'required|max:500',
        ]);

        BlogSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
            ]
        );

        toastr()->success('Your Blog Setting Section Updated Successfully', 'Congrats');
        return redirect()->route('admin.blog-setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
