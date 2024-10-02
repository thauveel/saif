<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name' => 'Administrator',
        //     'email' => 'info@rac.gov.mv',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10),
        // ]);

        DB::table('tournaments')->insert([
            'id' => '03c34260-7b80-48f9-b7dd-79046e4cd2a5',
            'name' => 'Arutha Volleyball Tournament',
            'slug' => 'AV24',
            'description' => 'Join the excitement of the Arutha Volleyball Tournament, an event open to all teams from our atoll! This thrilling competition brings together the best volleyball talent, fostering sportsmanship, teamwork, and community spirit. Get ready to spike, serve, and soar in a battle for the championship title!',
            'date' => '2024-09-28',
            'due_date' => '2024-09-25',
            'venue' => 'R.Meedhoo',
            'logo' =>'/av24.png',
            'tc' =>'/av24.pdf',
            'status' => 'open',
            'type' => 'volleyball',
            'max_players' => 15,
            'max_officials' => 5,
            'max_jersey_no' => 21
        ]);

        DB::table('tournaments')->insert([
            'id' => '6727de06-6d73-4b25-a9d6-9b40a8faab4e',
            'name' => 'Arutha Handball Tournament',
            'slug' => 'AH24',
            'description' => 'The Arutha Handball Tournament is now open to teams across our atoll! This exciting competition showcases fast-paced action, teamwork, and skill. Come together to compete, have fun, and celebrate the spirit of handball as teams battle for victory and local pride!',
            'date' => '2024-09-28',
            'due_date' => '2024-09-25',
            'venue' => 'R.Meedhoo',
            'logo' =>'/ah24.png',
            'tc' =>'/ah24.pdf',
            'status' => 'open',
            'type' => 'handball',
            'max_players' => 14,
            'max_officials' => 4,
            'max_jersey_no' => 99
        ]);

        DB::table('tournaments')->insert([
            'id' => 'b09037eb-1fa1-4ccc-9256-9f86532d5a70',
            'name' => 'Arutha Futsal Tournament',
            'slug' => 'AF24',
            'description' => 'The Arutha Futsal Tournament is now open to teams across our atoll! This exciting competition showcases fast-paced action, teamwork, and skill. Come together to compete, have fun, and celebrate the spirit of futsal as teams battle for victory and local pride!',
            'date' => '2024-10-15',
            'due_date' => '2024-10-13',
            'venue' => null,
            'logo' =>'/af24.png',
            'tc' =>'/af24.pdf',
            'status' => 'open',
            'type' => 'futsal',
            'max_players' => 12,
            'max_officials' => 4,
            'max_jersey_no' => 99,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
