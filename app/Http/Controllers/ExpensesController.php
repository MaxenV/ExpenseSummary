<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ExpenseRequest;


class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $expensesByDayOfWeek = Expense::select(
            DB::raw('DAYOFWEEK(date) as day_of_week'),
            DB::raw('SUM(price_one * quantity) as total_amount')
        )
            ->groupBy('day_of_week')
            ->pluck('total_amount', 'day_of_week');

        return view('expenses.index', [
            'expenses' => Expense::where('userId', $user->id)->get(),
            'expensesByDayOfWeek' => $expensesByDayOfWeek
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingTypes = Expense::all('type')->groupBy('type');
        return view('expenses.create', ['existingTypes' => $existingTypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request)
    {
        $user = Auth::user();

        $expense = new Expense();
        $expense->name = $request->name;
        $expense->userId = $user->id;
        $expense->price_one = $request->price;
        $expense->quantity = $request->quantity;
        $expense->date = $request->date;

        if ($request->newTypeCheck) {
            $expense->type = $request->newType;
        } else {
            $expense->type = $request->type;
        }

        $expense->save();

        return redirect(route('expenses.create'));
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
    public function edit(Expense $expense)
    {
        $existingTypes = Expense::all('type')->groupBy('type');
        return view(
            "expenses.edit",
            [
                "expense" => $expense,
                'existingTypes' => $existingTypes
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseRequest $request, Expense $expense)
    {
        //
        $expense->fill($request->all());
        $expense->save();

        return redirect(route("expenses.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        try {
            $expense->delete();
            return response()->json(['status' => 'success']);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                "message" => "Wystąpił błąd!"
            ])->setStatusCode(500);
        }

    }
}