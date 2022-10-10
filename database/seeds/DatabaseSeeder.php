<?php

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
        factory(App\Owner::class, 500)->create()->each(function ($owner) {
            factory(App\Address::class, rand(1, 3))->create(['owner_id' => $owner->id])->each(function ($address) use ($owner) {
                factory(App\Car::class, rand(1, 3))->create(['owner_id' => $owner->id, 'address_id' => $address->id]);
            });
        });
    }
}
