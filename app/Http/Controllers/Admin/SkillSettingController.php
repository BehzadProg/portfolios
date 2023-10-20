<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillSetting;
use Illuminate\Http\Request;

class SkillSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skillSetting = SkillSetting::first();
        return view('admin.skill-setting.index' , compact('skillSetting'));
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
            'sub_title' => 'required|max:500',
            'image' => 'mimes:png,jpeg,jpg,svg|max:5000',
        ]);

        $skill = SkillSetting::first();
        $imagePath = handleUpload('image' , $skill , env('SKILL_SETTING_IMAGE_UPLOAD_PATH'));

        SkillSetting::updateOrCreate(
            ['id' => $id],
            [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => isset($imagePath) ? $imagePath : $skill->image,
        ]);

        toastr()->success('Your Skill Setting Section Updated Successfully','Congrats');
        return redirect()->route('admin.skill-setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
