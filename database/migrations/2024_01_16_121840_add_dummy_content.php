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
        # Password "test1234" for both users
        $usersData = array(
            ["name" => "test", "surname" => "testowy", "email" => "test@test.com", "password" => '$2y$12$6iq2Xapk/LTqCAwSjURa1uKVNBBxZdlW5zBusZ/lB9GjhdtLMr2Qa'],
            ["name" => "test2", "surname" => "testowy", "email" => "test2@test.com", "password" => '$2y$12$6iq2Xapk/LTqCAwSjURa1uKVNBBxZdlW5zBusZ/lB9GjhdtLMr2Qa'],
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
            ["name" => "Poduszki", "userId" => 1, "price_one" => 20, "quantity" => 2, "type" => 'dom', "date" => '2024-02-11'],
            ["name" => "Laptop", "userId" => 1, "price_one" => 1500, "quantity" => 1, "type" => 'elektronika', "date" => '2024-02-12'],
            ["name" => "Owoce", "userId" => 1, "price_one" => 10, "quantity" => 5, "type" => 'jedzenie', "date" => '2024-02-13'],
            ["name" => "Obuwie sportowe", "userId" => 1, "price_one" => 80, "quantity" => 1, "type" => 'obuwie', "date" => '2024-02-14'],
            ["name" => "Łóżko", "userId" => 1, "price_one" => 400, "quantity" => 1, "type" => 'meble', "date" => '2024-02-15'],
            ["name" => "Lampa biurkowa", "userId" => 1, "price_one" => 30, "quantity" => 2, "type" => 'dom', "date" => '2024-02-16'],
            ["name" => "Spodnie jeansowe", "userId" => 1, "price_one" => 45, "quantity" => 2, "type" => 'odzież', "date" => '2024-02-17'],
            ["name" => "Gry planszowe", "userId" => 1, "price_one" => 35, "quantity" => 3, "type" => 'rozrywka', "date" => '2024-02-18'],
            ["name" => "Kawa", "userId" => 1, "price_one" => 8, "quantity" => 3, "type" => 'jedzenie', "date" => '2024-02-19'],
            ["name" => "Biurko", "userId" => 1, "price_one" => 120, "quantity" => 1, "type" => 'meble', "date" => '2024-02-20'],
            ["name" => "Kosmetyki", "userId" => 1, "price_one" => 25, "quantity" => 2, "type" => 'higiena', "date" => '2024-02-01'],
            ["name" => "Bilet na koncert", "userId" => 1, "price_one" => 60, "quantity" => 2, "type" => 'rozrywka', "date" => '2024-02-02'],
            ["name" => "Opony zimowe", "userId" => 1, "price_one" => 100, "quantity" => 4, "type" => 'motoryzacja', "date" => '2024-02-03'],
            ["name" => "Książki", "userId" => 1, "price_one" => 15, "quantity" => 5, "type" => 'rozrywka', "date" => '2024-02-04'],
            ["name" => "Deska do prasowania", "userId" => 1, "price_one" => 40, "quantity" => 1, "type" => 'dom', "date" => '2024-02-05'],
            ["name" => "Karnet na siłownię", "userId" => 1, "price_one" => 50, "quantity" => 1, "type" => 'sport', "date" => '2024-02-06'],
            ["name" => "Odpływ liniowy", "userId" => 1, "price_one" => 35, "quantity" => 2, "type" => 'dom', "date" => '2024-02-07'],
            ["name" => "Kurtka zimowa", "userId" => 1, "price_one" => 80, "quantity" => 1, "type" => 'odzież', "date" => '2024-02-08'],
            ["name" => "Konsultacja z dietetykiem", "userId" => 1, "price_one" => 70, "quantity" => 1, "type" => 'zdrowie', "date" => '2024-02-09'],
            ["name" => "PlayStation 5", "userId" => 1, "price_one" => 500, "quantity" => 1, "type" => 'elektronika', "date" => '2024-02-10'],
            ["name" => "Chleb", "userId" => 1, "price_one" => 4.2, "quantity" => 3, "type" => 'jedzenie', "date" => '2024-01-10'],
            ["name" => "Mieso", "userId" => 1, "price_one" => 15, "quantity" => 0.5, "type" => 'jedzenie', "date" => '2024-01-10'],
            ["name" => "Telefon", "userId" => 1, "price_one" => 1200, "quantity" => 1, "type" => 'elektronika', "date" => '2024-01-10'],
            ["name" => "Laptop", "userId" => 1, "price_one" => 2500, "quantity" => 1, "type" => 'elektronika', "date" => '2024-01-11'],
            ["name" => "Kawa", "userId" => 1, "price_one" => 8, "quantity" => 5, "type" => 'jedzenie', "date" => '2024-01-11'],
            ["name" => "Koszula", "userId" => 1, "price_one" => 50, "quantity" => 2, "type" => 'odzież', "date" => '2024-01-12'],
            ["name" => "Gry planszowe", "userId" => 1, "price_one" => 30, "quantity" => 3, "type" => 'rozrywka', "date" => '2024-01-12'],
            ["name" => "Olej rzepakowy", "userId" => 1, "price_one" => 6, "quantity" => 4, "type" => 'jedzenie', "date" => '2024-01-13'],
            ["name" => "Słuchawki", "userId" => 1, "price_one" => 150, "quantity" => 1, "type" => 'elektronika', "date" => '2024-01-30'],
            ["name" => "Fotel biurowy", "userId" => 1, "price_one" => 300, "quantity" => 1, "type" => 'meble', "date" => '2024-01-30'],
            ["name" => "Obraz", "userId" => 1, "price_one" => 80, "quantity" => 1, "type" => 'dekoracje', "date" => '2024-01-31'],
            ["name" => "Buty sportowe", "userId" => 1, "price_one" => 120, "quantity" => 1, "type" => 'obuwie', "date" => '2024-01-31'],
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