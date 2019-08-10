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
        $schedule = \Carbon\Carbon::create('2019-08-01 09:00:00');
        $barber = factory(App\Barber::class)->create(['name' => 'Studio JB', 'slug' => 'JB']);
        factory(App\User::class)->create(['name' => 'Paulo Victor', 'email' => 'pvstelles@gmail.com', 'password' => bcrypt('secret123'), 'barber_id' => $barber->id]);
        factory(App\Costumer::class,10)->create(['barber_id' => $barber->id]);
        factory(App\Service::class,10)->create(['barber_id' => $barber->id]);
        factory(App\ScheduleBarber::class)->create(['schedule_at' => $schedule, 'barber_id' => 1, 'costumer_id' => 1, 'service_id' => 1]);
        factory(App\ScheduleBarber::class)->create(['schedule_at' => $schedule->clone()->addHour(1), 'barber_id' => 1, 'costumer_id' => 1, 'service_id' => 1]);
        factory(App\ScheduleBarber::class)->create(['schedule_at' => $schedule->clone()->addHour(1)->addMinute(30), 'barber_id' => 1, 'costumer_id' => 1, 'service_id' => 1]);
    }
}
