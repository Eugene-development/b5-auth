<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/health', function () {
    return "Health check";
});



Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return 'База данных подключена!!!';
    } catch (\Exception $e) {
        return 'Unable to connect to the database: ' . $e->getMessage();
    }
});


// Route::get('/test-db', function () {
//     try {
//         DB::connection()->getPdo();
//         return 'База данных подключена!!!';
//     } catch (\Exception $e) {
//         return 'Unable to connect to the database: ' . $e->getMessage();
//     }
// })->middleware('auth:sanctum');
