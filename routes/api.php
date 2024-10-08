<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {});

// routes/api.php

Route::post('webhook', 'webhookController@fingerspotHandler');
Route::post('scanlog', 'ScanlogController@synchronize');
