<?php

namespace App\Http\Controllers;

use App\Models\QuantityUnit;
use App\Http\Requests\StoreQuantityUnitRequest;
use App\Http\Requests\UpdateQuantityUnitRequest;
use Illuminate\Support\Facades\File;

class QuantityUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allquantitiesunit = QuantityUnit::where('added_from', session()->get('user_added'))->latest()->get();
        $compact = compact("allquantitiesunit");
        return view('Quantity.view')->with($compact);
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
    public function store(StoreQuantityUnitRequest $request)
    {
        $quantityUnit = QuantityUnit::where('quantity_unit', $request->quantity_unit)->count();
        if ($quantityUnit == 0) {
            $input = $request->all();
            $input['quantity_unit'] = ucfirst($request->quantity_unit);
            $input['added_from'] = session()->get('user_added');
            QuantityUnit::create($input);
            return response()->json([
                "message" => "quantityunit",
                "data" => QuantityUnit::where('added_from', session()->get('user_added'))->latest()->get(),
            ]);
        } else {
            return response()->json([
                "error" => "already exists quantity",
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $quantityUnit = QuantityUnit::where('id', $id)->first();
        return response()->json([
            "message" => $quantityUnit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuantityUnitRequest $request, $id)
    {
        $quantityUnit = QuantityUnit::where('id', $id)->first();
        $input = $request->all();
        $input['quantity_unit'] = ucfirst($request->quantity_unit);
        $input['added_from'] = session()->get('user_added');
        $quantityUnit->update($input);
        return response()->json([
            "module" => "quantityunitupdate",
            "module_data" => $quantityUnit,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        QuantityUnit::where('id', $id)->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
}
