<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
});

// routes/api.php

Route::get('webhook', 'WebhookController@fingerspotHandler');
Route::post('scanlog', 'ScanlogController@synchronize');
