<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\PortfolioItemDataTable;
use App\Models\PortfolioItem;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioItemDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.portfolio-item.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'required',
            'category_id' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg,svg|max:5000',
            'client' => 'max:200',
            'website' => 'nullable|url',
        ]);

        $imagePath = handleUpload('image',null,env('PORTFOLIO_ITEM_IMAGE_UPLOAD_PATH'));

        $portfolioItem = new PortfolioItem();
        $portfolioItem->image = $imagePath;
        $portfolioItem->title = $request->title;
        $portfolioItem->description = $request->description;
        $portfolioItem->category_id = $request->category_id;
        $portfolioItem->client = $request->client;
        $portfolioItem->website = $request->website;
        $portfolioItem->save();

        toastr()->success('Portfolio Item Created Successfully','Congrate');
        return redirect()->route('admin.portfolio-item.index');

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
        $portfolioItem = PortfolioItem::findOrFail($id);
        $categories = Category::all();
        return view('admin.portfolio-item.edit' , compact('portfolioItem' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'required',
            'category_id' => 'required|numeric',
            'image' => 'mimes:png,jpg,jpeg,svg|max:5000',
            'client' => 'max:200',
            'website' => 'nullable|url',
        ]);

        $portfolioItem = PortfolioItem::findOrFail($id);
        $imagePath = handleUpload('image',$portfolioItem,env('PORTFOLIO_ITEM_IMAGE_UPLOAD_PATH'));


        $portfolioItem->image = (!empty($imagePath) ? $imagePath : $portfolioItem->image);
        $portfolioItem->title = $request->title;
        $portfolioItem->description = $request->description;
        $portfolioItem->category_id = $request->category_id;
        $portfolioItem->client = $request->client;
        $portfolioItem->website = $request->website;
        $portfolioItem->save();

        toastr()->success('Portfolio Item Updated Successfully','Congrate');
        return redirect()->route('admin.portfolio-item.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        deleteFileIfExist(env('PORTFOLIO_ITEM_IMAGE_UPLOAD_PATH').$portfolioItem->image);
        $portfolioItem->delete();

    }
}
