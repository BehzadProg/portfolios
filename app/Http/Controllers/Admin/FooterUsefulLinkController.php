<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterUsefulLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterUsefulLink;
use Illuminate\Http\Request;

class FooterUsefulLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterUsefulLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footer-useful-link.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-useful-link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'url' => 'required',
        ]);

        $social = new FooterUsefulLink();
        $social->name = $request->name;
        $social->url = $request->url;
        $social->save();

        toastr()->success('Useful Link Created Successfully', 'Congrats');
        return redirect()->route('admin.footer-useful-link.index');
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
        $usefulLink = FooterUsefulLink::findOrFail($id);
        return view('admin.footer-useful-link.edit' , compact('usefulLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:200',
            'url' => 'required',
        ]);

        $usefulLink = FooterUsefulLink::findOrFail($id);
        $usefulLink->name = $request->name;
        $usefulLink->url = $request->url;
        $usefulLink->save();

        toastr()->success('Useful Link Updated Successfully', 'Congrats');
        return redirect()->route('admin.footer-useful-link.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usefulLink = FooterUsefulLink::findOrFail($id);
        $usefulLink->delete();
    }
}
