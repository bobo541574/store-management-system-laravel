<?php

namespace App\Http\Controllers\Backend;

use App\Models\State;
use App\Models\Contact;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use Exception;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::latest()->get();

        return view('backend.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        (old('row') > 0) ? ($rowCount = count(old('row')) - 1) : ($rowCount = 0);

        $supplier = 0;
        $states = State::all();

        return view('backend.suppliers.create', compact('supplier', 'states', 'rowCount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        DB::beginTransaction();

        try {

            $logo = $this->photoUpload($request, '/img/supplier/');

            $supplier = Supplier::create([
                'name' => $request->name,
                'logo' => $logo
            ]);
            foreach ($request->row as $contact) {
                $supplier->contacts()->create([
                    'email'  => $contact['email'],
                    'phone'  => $contact['phone'],
                    'address'  => $contact['address'],
                    'township_id'  => $contact['township'],
                    'city_id'  => $contact['city'],
                    'state_id'  => $contact['state'],
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->route('suppliers.index')->with('error', 'Hey, you have some error.');

            // throw $e;
        }

        return redirect()->route('suppliers.index')->with('success', 'Your supplier has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('backend.suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        // dd($supplier->contacts);
        (old('row') > 0) ? ($rowCount = count(old('row')) - 1) : ($rowCount = 0);
        $states = State::all();
        return view('backend.suppliers.edit', compact('supplier', 'states', 'rowCount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, $id)
    {
        DB::beginTransaction();

        try {

            $logo = $this->photoUpload($request, '/img/supplier/');

            $supplier = Supplier::find($id);
            $supplier->name = $request->name;
            $supplier->logo  = $logo ?? $request->logo;
            $supplier->save();

            foreach ($supplier->contacts as $key => $contact) {
                $contact->phone  = $request->row[$key]['phone'];
                $contact->address  = $request->row[$key]['address'];
                $contact->township_id  = $request->row[$key]['township'];
                $contact->city_id  = $request->row[$key]['city'];
                $contact->state_id  = $request->row[$key]['state'];
                $contact->email  = $request->row[$key]['email'];
                $contact->save();
            }

            for ($key; $key < (count($request->row) - 1);) {
                ++$key;
                $supplier->contacts()->create([
                    'phone'  => $request->row[$key]['phone'],
                    'address'  => $request->row[$key]['address'],
                    'township_id'  => $request->row[$key]['township'],
                    'city_id'  => $request->row[$key]['city'],
                    'state_id'  => $request->row[$key]['state'],
                    'email'  => $request->row[$key]['email'],
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->route('suppliers.index')->with('error', 'Hey, you have some error.');
        }

        return redirect()->route('suppliers.index')->with('success', 'Your supplier has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        foreach ($supplier->contacts as $contact) {
            $contact->delete();
        }

        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Your supplier has been deleted.');
    }
}