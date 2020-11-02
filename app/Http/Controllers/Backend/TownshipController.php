<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TownshipRequest;
use App\Models\City;
use App\Models\Township;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
    /**
     * Listening ajax request from city.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxRequestFromCity($id)
    {
        $townships = Township::where('city_id', $id)->get();

        return $townships;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $townships = Township::all();

        return view('backend.townships.index', compact('townships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();

        return view('backend.townships.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TownshipRequest $request)
    {
        Township::create([
            'name'  => $request->name,
            'city_id'  => $request->city
        ]);

        return redirect()->route('townships.index')->with('success', 'Your township has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Township $township)
    {
        return view('backend.townships.show', compact('township'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Township $township)
    {
        $cities = City::all();

        return view('backend.townships.edit', compact('township', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TownshipRequest $request, Township $township)
    {
        $township->name = $request->name;
        $township->city_id = $request->city;
        $township->save();

        return redirect()->route('townships.index')->with('success', 'Your township has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Township $township)
    {
        $township->delete();

        return redirect()->route('cities.index')->with('success', 'Your township has been deleted.');
    }
}