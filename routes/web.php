<?php

use \Illuminate\Support\Facades\Route;


Route::get('ttt', function () {


    $arr = [
        'name1' => 'asd',
        'name6' => 'aaa',
        'name100' => 'vvv'
    ];

    $keys = array_keys($arr); // name1, name6, name100

    $len = count($keys); // 3
    for($i = 0; $i < $len; $i++) {
        $currentKey = $keys[$i];
    }

    return view('test');
});

Route::resource('/users', 'UsersController')->only(['index']);


Route::get('categories', function () {
    //read from cache is exists if no -read from DB and wrote to cache for 1 week. cache key = categories
    $categories = \Illuminate\Support\Facades\Cache::get('categories', []);

    if (!$categories) {
        $categories = 'Read from model.....';
        \Illuminate\Support\Facades\Cache::put('categories', $categories);
        return $categories;
    }
});

Route::put('categories/{id}', function () {
    \Illuminate\Support\Facades\Cache::forget('categories');
});

Route::get('search2', function (\Illuminate\Http\Request $request) {
    return \App\Models\User::query()->where('email', '=', $request->q)->get();
});

Route::get('search', function (\Illuminate\Http\Request $request) {

    $q = $request->input('q');
    $page = $request->page ?? 0;

    $cacheKey = 'users_' . $q . '_' . $page; // => users_3333_0

    if ($data = \Illuminate\Support\Facades\Cache::get($cacheKey )) {
        return [
            'source' => 'cache',
            'data' => $data
        ];
    }

    $users = \App\Models\User::query()->where('email', "LIKE", "%$q%")->get();

    \Illuminate\Support\Facades\Cache::put($cacheKey, $users, \Carbon\Carbon::now()->addMinute());

    return [
        'source' => 'DB',
        'data' => $users
    ];
});


Route::get('/set', function () {
    $user = \App\Models\User::query()->where('id', 201)->first()->toArray();
    \Illuminate\Support\Facades\Cache::put('user', json_encode($user));
});

Route::get('/get', function () {
    $cachedData = \Illuminate\Support\Facades\Cache::get('user');

    if ($cachedData) {
        echo "Load from cache";
        $user = $cachedData;
    } else {
        echo "Load from DB";
        $user = \App\Models\User::query()->where('id', 201)->first()->toArray();
        \Illuminate\Support\Facades\Cache::put('user', $user, \Carbon\Carbon::now()->addSeconds(10));
    }

    return $user;
});


Route::get('/list', function () {
    $start = microtime(true);


    $users = \App\Models\User::query()->whereBetween('id', [200, 205])->get();
    \Illuminate\Support\Facades\Cache::put('users', $users, \Carbon\Carbon::now()->addMinutes(2));

    for($i = 0; $i < 5000; $i++) {
        $users = \App\Models\User::query()->whereBetween('id', [200, 205])->get();
    }

    echo microtime(true) - $start;
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', "PostsController");

Route::get('asd', function () {
    die("Hello world");
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('users', function () {
        dd(\App\Models\User::all());
    });

    Route::get('posts', function () {
        \App\Models\Post::all();
    });
});
