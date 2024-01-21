<?php

use App\Models\User;
use App\Models\Expense;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->add_users();
        $this->add_expenses();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
    function add_users()
    {
        $usersData = array(
            ["name" => "test", "surname" => "testowy", "email" => "test@test.com", "password" => '$2y$12$6iq2Xapk/LTqCAwSjURa1uKVNBBxZdlW5zBusZ/lB9GjhdtLMr2Qa'],
            ["name" => "test", "surname" => "test", "email" => "test@test.pl", "password" => '$2y$12$h3Ri.Fa5/FMZ0m60ZoBUUeujn2RsB5hexAWnWtBlE8MsnnFiY1sTi'],
            ["name" => "test1", "surname" => "test1", "email" => "test3@test.pl", "password" => '$2y$12$h3Ri.Fa5/FMZ0m60ZoBUUeujn2RsB5hexAWnWtBlE8MsnnFiY1sTi'],
        );
        foreach ($usersData as $datum) {
            $userCategory = new User();
            $userCategory->name = $datum['name'];
            $userCategory->email = $datum['email'];
            $userCategory->password = $datum['password'];
            $userCategory->save();
        }
    }
    function add_expenses()
    {
        $expensesData = array(
            ["name" => "Chleb", "userId" => 1, "price_one" => 4.2, "quantity" => 3, "type" => 'jedzenie', "date" => '2024-01-10'],
            ["name" => "Mieso", "userId" => 1, "price_one" => 15, "quantity" => 0.5, "type" => 'jedzenie', "date" => '2024-01-10'],
            ["name" => "Telefon", "userId" => 1, "price_one" => 1200, "quantity" => 1, "type" => 'elektronika', "date" => '2024-01-10'],
        );
        foreach ($expensesData as $data) {
            $expensesCategory = new Expense();
            $expensesCategory->name = $data['name'];
            $expensesCategory->userId = $data['userId'];
            $expensesCategory->price_one = $data['price_one'];
            $expensesCategory->quantity = $data['quantity'];
            $expensesCategory->type = $data['type'];
            $expensesCategory->date = $data['date'];
            $expensesCategory->save();
        }
    }

};