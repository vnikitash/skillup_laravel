<?php

namespace App\Console\Commands;

use App\Services\WeatherService;
use Illuminate\Console\Command;

class WeatherCommand extends Command
{

    private $weatherService ;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(WeatherService $weatherService)
    {
        parent::__construct();
        $this->weatherService = $weatherService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo $this->weatherService->getWeatherString($this->argument('city')) . PHP_EOL;
    }
}
