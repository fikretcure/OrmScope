<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Perfection;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Position::create(["name" => "Back"]);
        Position::create(["name" => "Front"]);
        Position::create(["name" => "Full"]);
        //
        Perfection::create(["name" => "Junior"]);
        Perfection::create(["name" => "Middle"]);
        Perfection::create(["name" => "Senior"]);
        //
        User::factory(61)->create();
        //
        User::whereIn("id", [1, 2, 3])->update([
            "city" => "Trabzon",
            "positions_id" => 3,
            "perfections_id" => 3,
        ]);
    }
}
