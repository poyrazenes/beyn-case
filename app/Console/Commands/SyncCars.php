<?php

namespace App\Console\Commands;

use App\Models\Car;
use App\Services\Integration\CarServiceContract;
use Illuminate\Console\Command;

class SyncCars extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:cars';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /*
     * Car integration service...
     */
    protected $carService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->carService = resolve(CarServiceContract::class);

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $car_list = $this->carService->fetchCarList();

        if (!empty($car_list)) {
            foreach ($car_list as $params) {
                $remote_id = $params['id'];

                unset($params['id']);

                Car::updateOrCreate([
                    'remote_id' => $remote_id,
                ], $params);

                $this->info("Car updated or created {$remote_id}");
            }
        }
    }
}
