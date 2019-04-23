<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('login','APIController@login')->name('login');

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => '10',
        'redirect_uri' => 'http://contoh.com/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://contoh.com/oauth/authorize?'.$query);
})->name('authorizeApi');

Route::get('/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('http://contoh.com/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '10',
            'client_secret' => 'OEukvq32mb43S66bPdZHb4FVYpLKN9OhecmzpzMQ',
            'redirect_uri' => 'http://contoh.com/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
})->name('tokenReq');
