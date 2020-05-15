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
        // $this->call(UsersTableSeeder::class);

        factory(App\User::class, 20)->create();
        factory(App\Company::class, 20)->create();
        factory(App\Job::class, 20)->create();


        //  category factory manual
        $categories = [
            'Govt.', 'NGO', 'Banking', 'Soft. Engineering',
            'Networking', 'Airlines'
        ];
        foreach ($categories as $category) {
            App\Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }

    }
}
