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
            ["name" => "email", "surname" => "email2", "email" => "email@test.pl", "password" => '$2y$12$w8vcv8YiBScJSIN3SWnBROUHm/xc/hCWfNOdX6PiQ91aNnai5idga'],
        );
        foreach ($usersData as $datum) {
            $userCategory = new User();
            $userCategory->name = $datum['name'];
            $userCategory->email = $datum['email'];
            $userCategory->password = $datum['password'];
            $userCategory->save();
        }
    }


};