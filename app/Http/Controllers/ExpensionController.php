<?php

namespace App\Http\Controllers;

use App\Models\Expension;
use Illuminate\Http\Request;
use App\Models\Type;
use Exception;
use Illuminate\Support\Facades\Auth;


class ExpensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('expenses.index', [
            'expensions' => Expension::where('userId', $user->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingTypes = Expension::all('type')->groupBy('type');
        return view('expenses.create', ['existingTypes' => $existingTypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $expension = new Expension();
        $expension->name = $request->name;
        $expension->userId = $user->id;
        $expension->price_one = $request->price;
        $expension->quantity = $request->quantity;
        $expension->type = $request->type;
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
    public function update(Request $request, Expension $expension)
    {
        //
        $expension->fill($request->all());
        $expension->save();

        return redirect(route("expenses.index"));
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