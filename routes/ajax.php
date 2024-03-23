<?php

use Illuminate\Support\Facades\Route;

   Route::group(["prefix" => "dashboard/ajax"], function () {
        Route::get('/get-users', [App\Http\Controllers\Ajax\AjaxController::class, 'getUsers'])->name('get.users');
        Route::get('/get-nationality', [App\Http\Controllers\Ajax\AjaxController::class, 'getNationalities'])->name('get.nationalities');
        Route::get('/get-tags', [App\Http\Controllers\Ajax\AjaxController::class, 'getTags'])->name('get.tags');
        Route::post('/update-bulk-statuses', [App\Http\Controllers\Ajax\AjaxController::class, 'bulkUpdateStatus'])->name('bulk.status.update');
        Route::post('/bulk-archive', [App\Http\Controllers\Ajax\AjaxController::class, 'bulkArchive'])->name('bulk.archive');
        Route::post('/get-activity-log', [App\Http\Controllers\Ajax\AjaxController::class, 'getActivityLog'])->name('getActivityLog');
        Route::post('/get-notes', [App\Http\Controllers\Ajax\AjaxController::class, 'getNotes'])->name('getNotes');
        Route::post('/store-note', [App\Http\Controllers\Ajax\AjaxController::class, 'storeNote'])->name('storeNote');
    });


    Route::group(["prefix" => "crane/crypto"], function () {
        Route::post('/get-cryptos', [App\Http\Controllers\Ajax\AjaxController::class, 'getCurrencies'])->name('get.cryptos');
        Route::post('/get-forex', [App\Http\Controllers\Ajax\AjaxController::class, 'getForex'])->name('get.forex');

    });
