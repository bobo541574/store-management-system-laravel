<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SizeAttribute;
use Illuminate\Http\Request;

class SizeAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = SizeAttribute::all();

        return view('backend.sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SizeAttribute::create([
            'letter'    => $request->letter ?? null,
            'number'    => $request->number ?? null,
        ]);

        return view('backend.sizes.index')->with('success', 'You size has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SizeAttribute $size)
    {
        return view('backend.sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SizeAttribute $size)
    {
        $size->letter    = $request->letter ?? null;
        $size->number    = $request->number ?? null;
        $size->save();

        return view('backend.sizes.index')->with('success', 'You size has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SizeAttribute $size)
    {
        $size->delete();

        return view('backend.sizes.index')->with('success', 'You size has been updated.');
    }
}