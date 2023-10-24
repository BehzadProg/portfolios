<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use Illuminate\Http\Request;

class FooterInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footerInfo = FooterInfo::first();
        return view('admin.footer-info.index',compact('footerInfo'));
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
            'sub_title' => 'max:200',
            'powered_by' => 'max:200',
            'copy_right' => 'max:200',
        ]);

        FooterInfo::updateOrCreate(
            ['id' => $id],
            [
                'sub_title' => $request->sub_title,
                'powered_by' => $request->powered_by,
                'copy_right' => $request->copy_right,
            ]
        );

        toastr()->success('Your Footer Info Updated Successfully', 'Congrats');
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
