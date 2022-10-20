<?php

use App\Models\Slider;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return inertia("Welcome", [
        'slides' => Slider::all(),
    ]);
});
Route::get('/test', function () {
    return inertia("Test");
});

Route::post('/add-slide', function () {
    $path = request()->file('logo')->store('/logos');
    Slider::create([
        'title' => [
            'text' => request('mainTitle'),
            'color' => request('mainTitleColor'),
            'y' => request('mainTitlePositionY'),
            'x' => request('mainTitlePositionX'),
            'size' => request('mainTitleSize'),
        ],
        'logo' => [
            'image' => $path,
            'x' => request('logoPositionX'),
            'y' => request('logoPositionY'),
            'height' => request('logoHeight'),
            'width' => request('logoWidth'),
        ],
        'background' => request('backgroundColor')
        ]);

        return redirect('/');
});


require __DIR__.'/auth.php';
