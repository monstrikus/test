<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/get-pdf', function () {

    // формируем PDF вложение
    $pdf = \Illuminate\Support\Facades\App::make('dompdf.wrapper');
    $filename = mt_rand();
    $pdf->loadView('pdf', ['data' => 'Привет!!!']); // return $pdf->stream('invoice.pdf');
    $path = public_path($filename .'.pdf');
    $pdf->save($path);
    return $filename;
});
