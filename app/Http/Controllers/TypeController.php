<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        return view("expenses.types", [
            'types' => Type::where('userId', $user->id)->get()
        ]);

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
    public function store(Request $request)
    {
        $user = Auth::user();
        $existingType = Type::where("userId", "=", $user->id)->where('name', '=', $request->name)->first();
        if ($existingType === null) {
            $type = new Type();
            $type->name = $request->name;
            $type->userId = $user->id;
            $type->save();
            return redirect(route('types.index', ["typeStoreSuccess" => true]));
        }
        return redirect(route('types.index', ["typeStoreSuccess" => false]));

    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        try {
            $type->delete();
            return response()->json(['status' => 'success']);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                "message" => "Wystąpił błąd!"
            ])->setStatusCode(500);
        }

    }
}