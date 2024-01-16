<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expension extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price_one",
        "quantity",
        "type",
        "date"
    ];
}