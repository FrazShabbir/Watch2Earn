<?php

use Illuminate\Support\Facades\Route;

Route::prefix('testing-env')->group(function () {
    Route::get('/', function(){
        $message = "Hello, this is a test message from Laravel";
        $chatIds = ['5970238984'];
        $bot = 'notification_bot';
        return sendTelegramMessage($message, $chatIds, $bot);
    });
});
