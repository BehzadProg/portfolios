<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Hero;
use File;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();
        return view('admin.hero.index' , compact('hero'));
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
            'image' => 'mimes:png,jpg,jpeg,svg',
        ]);

        try {

            $hero = Hero::first();

            $imagePath = handleUpload('image' , $hero , env('HERO_IMAGE_UPLOAD_PATH'));

            Hero::updateOrCreate(
                ['id' => $id],
                [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'btn_text' => $request->btn_text,
                'btn_url' => $request->btn_url,
                'image' => isset($imagePath) ? $imagePath : $hero->image,
            ]);




        DB::commit();
    } catch (\Exception $ex) {
        DB::rollBack();
        toastr()->error('There is a problem in updating Hero data', $ex->getMessage());
        return redirect()->back();
    }
        toastr()->success('Your Hero Section Updated Successfully','Congrats');
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
