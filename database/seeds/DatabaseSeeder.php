<?php

use App\Tax;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'name' => 'AntoGzz',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
    	]);

        $tax = Tax::create([
            'name' => 'IVA 12 %',
            'value' => 12
        ]);

         $tax = Tax::create([
            'name' => 'IVA 0 %',
            'value' => 0
        ]);

        factory(App\User::class, 2)->create();;
        $this->call(CountrySeeder::class);
    }
}
