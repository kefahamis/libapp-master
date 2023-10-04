<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Organization;
use App\Models\Subscription;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\User;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    protected $faker;

    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    public function run()
    {

        $faker = $this->faker;

        $users = [];

        for ($i = 0; $i < 10; $i++) {
            $email = $faker->safeEmail;

            while (User::where('email', $email)->exists()) {
                $email = $faker->safeEmail;
            }

            $users[] = [
                'name' => $faker->name,
                'email' => $email,
                'role' => $faker->randomElement([1, 3]),
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // // Insert the generated users into the database
        // User::insert($users);
        // User::whereIn('email', array_column($users, 'email'))

        User::factory(3)->create()
            ->each(function ($user) use ($faker) {

                // $user->update(['email' => 'test' . $user->id . '@test.com', 'role_as' => $faker->randomElement([1, 3]), 'password' => Hash::make('123456')]);
    
                Organization::factory(1)->create(['user_id' => $user->id])
                    ->each(function ($organization) use ($faker) {

                        $sk = array_keys(Subscription::subscriptionTypes())[rand(0, 1)];
                        $subsTypes = Subscription::subscriptionTypes();
                        $start = $faker->dateTimeInInterval('-1 week', '+3 months');
                        $start = date('Y-m-d H:i:s');
                        $end = Carbon::createFromFormat('Y-m-d H:i:s', $start);
                        $end->addMonths($subsTypes[$sk]['months']);
                        $start = date('Y-m-d H:i:s');

                        Subscription::factory(1)->create([
                            'organization_id' => $organization->id,
                            'subscription_type' => $sk,
                            'subscription_months' => $subsTypes[$sk]['months'],
                            'fee_per_user' => $subsTypes[$sk]['fee_per_user'],
                            'start_date' => $start,
                            'end_date' => $end->format('Y-m-d H:i:s'),
                            'status' => 'active',
                            'max_subscription_users' => rand(1, 100),
                            'max_courses' => $subsTypes[$sk]['max_courses']
                        ])
                            ->each(function ($subscription) {

                                for ($i = 1; $i <= rand(0, $subscription->max_subscription_users); $i++) {

                                    User::factory(1)->create()->each(function ($user) use ($subscription) {

                                        // $user->update(['email' => 'test' . $user->id . '@test.com', 'role_as' => 1, 'password' => Hash::make('123456')]);
                                        $user->subscriptionUsers()->create(['subscription_id' => $subscription->id, 'name' => $user->name]);
                                    });
                                }
                            });

                    });
            });

        Topic::create(['name' => 'Leadership Foundamentals']);
        Topic::create(['name' => 'Human Resource']);
        Topic::create(['name' => 'Excel fundamentals']);
        Topic::create(['name' => 'Project Management']);
        Topic::create(['name' => 'Entreprenuership']);

        Tag::create(['name' => 'popular']);
        Tag::create(['name' => 'recommended']);
        Tag::create(['name' => 'certification']);

        $date = Carbon::now();
        $date->addDays(5);
        $status = ['Published', 'Published', 'Published', 'Draft'];
        Course::factory(20)->create()->each(function ($course) {

            for ($i = 0; $i < rand(0, 3); $i++) {

                $course->topics()->save(Topic::inRandomOrder()->first());
            }

            for ($i = 0; $i < rand(0, 2); $i++) {

                $course->tags()->save(Tag::inRandomOrder()->first());
            }

        });

    }
}