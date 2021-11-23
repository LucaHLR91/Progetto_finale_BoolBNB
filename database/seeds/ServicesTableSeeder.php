<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['Wi-Fi', 'Aria Condizionata', 'Parcheggio', 'Piscina', 'Sauna', 'Portineria', 'Pulizie'];

        foreach($services as $service) {
            $new_service = new Service();
            $new_service->service_name = $service;
            $new_service->slug = Str::slug($service, '-');
            $new_service->save();
        }
    }
}
