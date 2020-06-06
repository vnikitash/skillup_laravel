<?php
/**
 * Created by PhpStorm.
 * User: viktor
 * Date: 06.06.2020
 * Time: 21:38
 */

namespace App\Services;


use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class WeatherService
{

    private $key = "886705b4c1182eb1c69f28eb8c520e20";

    public function __construct(?string $key = null)
    {
        $this->key = $key ?? $this->key;
    }

    public function getWeatherString($city = "Kiev"): string
    {
        $cacheKey = 'weather_' . $city;

        $cache = Cache::get($cacheKey);

        if ($cache) {
            return $cache;
        }

        $url = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid={$this->key}";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        $weather = json_decode($result, true);
        $name = $weather['weather'][0]['main'];
        $temp = ((float) Arr::get($weather, 'main.temp')) - 273.15;

        $string = "[$name] Temperature: $temp (C)";

        Cache::put($cacheKey, $string, Carbon::now()->addMinutes(5));

        return $string;
    }
}