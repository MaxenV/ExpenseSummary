<?php

namespace App\Http\Controllers;

use App\Models\Expension;
use Illuminate\Http\Request;
use App\Models\Type;

class ExpensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('expenses.index', [
            'expensions' => Expension::all(),
            "types" => Type::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $expension = new Expension();
        $expension->name = $request->name;
        $expension->userId = 1;
        $expension->price_one = $request->price;
        $expension->quantity = $request->quantity;
        $expension->type = 1;
        $expension->date = $request->date;
        $expension->save();

        return view('expenses.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}