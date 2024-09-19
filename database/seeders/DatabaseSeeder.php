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
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'info@rac.gov.mv',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        DB::table('tournaments')->insert([
            'id' => '03c34260-7b80-48f9-b7dd-79046e4cd2a5',
            'name' => 'Arutha Volleyball Tournament',
            'slug' => 'AV24',
            'description' => 'Join the excitement of the Arutha Volleyball Tournament, an event open to all teams from our atoll! This thrilling competition brings together the best volleyball talent, fostering sportsmanship, teamwork, and community spirit. Get ready to spike, serve, and soar in a battle for the championship title!',
            'date' => Carbon::now(),
            'due_date' => Carbon::now()->addMonth(1),
            'venue' => 'R.Meedhoo',
            'logo' =>'/av24.jpg',
            'tc' =>'/av24.pdf',
            'status' => 'open',
            'type' => 'volleyball',
            'max_players' => 15,
            'max_officials' => 5
        ]);

        DB::table('tournaments')->insert([
            'id' => '6727de06-6d73-4b25-a9d6-9b40a8faab4e',
            'name' => 'Arutha Handball Tournament',
            'slug' => 'AH24',
            'description' => 'The Arutha Handball Tournament is now open to teams across our atoll! This exciting competition showcases fast-paced action, teamwork, and skill. Come together to compete, have fun, and celebrate the spirit of handball as teams battle for victory and local pride!',
            'date' => Carbon::now(),
            'due_date' => Carbon::now()->addMonth(1),
            'venue' => 'R.Meedhoo',
            'logo' =>'/ah24.jpg',
            'tc' =>'/ah24.pdf',
            'status' => 'open',
            'type' => 'handball',
            'max_players' => 14,
            'max_officials' => 4
        ]);
    }
}
