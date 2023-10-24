<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $general = GeneralSetting::first();
        return view('admin.settings.general-setting.index' , compact('general'));
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
            'logo' => 'max:5000|image',
            'footer_logo' => 'max:5000|image',
            'favicon' => 'max:5000|image',
        ]);

        $general = GeneralSetting::first();
        $logo = handleUpload('logo',$general,env('GENERAL_SETTING_IMAGE_UPLOAD_PATH'));
        $footer_logo = handleUpload('footer_logo',$general,env('GENERAL_SETTING_IMAGE_UPLOAD_PATH'));
        $favicon = handleUpload('favicon',$general,env('GENERAL_SETTING_IMAGE_UPLOAD_PATH'));

        GeneralSetting::updateOrCreate(
            ['id' => $id],
            [
               'logo' => (!empty($logo) ? $logo : $general->logo),
               'footer_logo' => (!empty($footer_logo) ? $footer_logo : $general->footer_logo),
               'favicon' => (!empty($favicon) ? $favicon : $general->favicon)
            ]
        );
        toastr()->success('General Setting Updated Successfully','Congrats');
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
