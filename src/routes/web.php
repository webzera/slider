<?php
$namespace = 'Webzera\Slider\Http\Controllers';

Route::group([
    'namespace' => $namespace,
    'prefix' => 'admin',
], function(){
    // Route::get('/', function(){ return ['hey', 'John']; });
    
    Route::get('/slider', 'SliderController@index')->name('slider');
    // Route::Post('create', 'PaymentController@create')->name('create-payment');
    // Route::get('excute', 'PaymentController@excute')->name('excute-payment');
    // Route::get('cancel', 'PaymentController@cancel')->name('cancel-payment');
});