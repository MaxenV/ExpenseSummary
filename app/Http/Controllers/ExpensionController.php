<?php

namespace App\Http\Controllers;

use App\Models\Expension;
use Illuminate\Http\Request;
use App\Models\Type;
use Exception;

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
    public function edit(Expension $expension)
    {
        return view(
            "expenses.edit",
            ["expension" => $expension]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('expenses.index', [
            'expensions' => Expension::all(),
            "types" => Type::all(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expension $expension)
    {
        try {
            $expension->delete();
            return response()->json(['status' => 'success']);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                "message" => "Wystąpił błąd!"
            ])->setStatusCode(500);
        }

    }
}