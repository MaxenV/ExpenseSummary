<?php

use App\Models\Type;
use App\Models\User;
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
        $this->add_types();
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


    function add_types()
    {
        $typesData = [
            ["name" => "nazwa", "user_id" => 1],
            ["name" => "nazwa2", "user_id" => 1],
            ["name" => "nazwa3", "user_id" => 1],
            ["name" => "nazwa3", "user_id" => 1],
        ];

        foreach ($typesData as $datum) {
            $dataCategory = new Type();
            $dataCategory->name = $datum['name'];
            $dataCategory->userId = $datum['user_id'];
            $dataCategory->save();
        }
    }
};