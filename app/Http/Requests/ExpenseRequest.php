<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'date',
        'type',
        'newTypeCheck',
        'newType',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price_one' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'date' => 'required|date',
            'type' => 'nullable|string|max:255',
            'newTypeCheck' => 'nullable|in:true,false,on',
            'newType' => 'nullable|string|max:255',
        ];
    }
}