<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $weatherService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        die($this->weatherService->getWeatherString($request->city));

        return view('home');
    }
}
