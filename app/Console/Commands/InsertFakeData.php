<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Testing\Fakes\Fake;

class InsertFakeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:fakeData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for inserting users fake data.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $faker = Faker::create();

        $user = User::create([
            'first_name' => $faker->firstName,
            'middle_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'email' => $faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'phone' => $faker->phoneNumber,
        ]);
        $this->info('Fake user inserted successfully!');

    }
}
