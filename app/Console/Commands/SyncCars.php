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
                try {
                    $remote_id = $params['id'];
                    $years = $this->calculateYears($params['year']);

                    unset($params['id']);
                    unset($params['year']);

                    $params['year_start'] = $years['start'];
                    $params['year_end'] = $years['end'];

                    Car::updateOrCreate([
                        'remote_id' => $remote_id,
                    ], $params);

                    $this->info("Car updated or created {$remote_id}");
                } catch (\Throwable $exception) {
                }
            }
        }
    }

    private function calculateYears($year_interval)
    {
        $years = [
            'start' => 0,
            'end' => 0,
        ];

        if (strpos($year_interval, '-') !== false) {
            $exploded = explode(' - ', $year_interval);

            $years['start'] = (int) ($exploded[0] ?? 0);

            if (isset($exploded[1])) {
                if ($exploded[1] == 'Present') {
                    $years['end'] = 2150;
                } else {
                    $years['end'] = (int)$exploded[1];
                }
            }
        } else {
            $years['start'] = (int)$year_interval;
            $years['end'] = (int)$year_interval;
        }

        return $years;
    }
}
