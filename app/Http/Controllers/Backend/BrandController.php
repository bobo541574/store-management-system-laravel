<?php

namespace App\Http\Controllers\Backend;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        return view('backend.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::all();

        return view('backend.brands.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        if ($request->hasfile('logo')) {
            $image = $request->file('logo');
            $upload_path = public_path() . '/img/brand/';
            $logo = $image->getClientOriginalName();
            $image->move($upload_path, $logo);
        }

        Brand::create([
            'name'  => $request->name,
            'subcategory_id'  => $request->subcategory,
            'logo'  => $logo,
        ]);

        return redirect()->route('brands.index')->with('success', 'Your brand has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('backend.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $subcategories = SubCategory::all();
        return view('backend.brands.edit', compact('brand', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        if ($request->hasfile('logo')) {
            $image = $request->file('logo');
            $upload_path = public_path() . '/img/brand/';
            $logo = $image->getClientOriginalName();
            $image->move($upload_path, $logo);
        }

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->subcategory_id = $request->subcategory;
        $brand->logo = $logo ?? $request->logo;
        $brand->save();

        return redirect()->route('brands.index')->with('success', 'Your brand has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delet();

        return redirect()->route('brands.index')->with('success', 'Your brand has been deleted.');
    }
}