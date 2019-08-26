<?php

//ticket route 
Route::group(['middleware' => config('teaket.middleware')], function () {
    Route::prefix(config('teaket.web'))->group(function(){

        Route::get('list', 'Donkovah\Teaket\Controller\TeaketController@index')
        ->name('teaket.index');
    
        Route::get('ongoing', 'Donkovah\Teaket\Controller\TeaketController@index')
        ->name('teaket.ongoing');
    
        Route::get('closed', 'Donkovah\Teaket\Controller\TeaketController@index')
        ->name('teaket.closed');
    
        Route::get('{teaket}/detail', 'Donkovah\Teaket\Controller\TeaketController@show')
        ->name('teaket.show');
    
        Route::get('create', 'Donkovah\Teaket\Controller\TeaketController@create')
        ->name('teaket.create');

        Route::get(
            'create/category/{category}', 
            'Donkovah\Teaket\Controller\TeaketController@getAdminCategory'
        )
        ->name('teaket.create.category');
    
        Route::get('{teaket}/edit', 'Donkovah\Teaket\Controller\TeaketController@edit')
        ->name('teaket.edit');
    
        Route::post('store', 'Donkovah\Teaket\Controller\TeaketController@store')
        ->name('teaket.store');
    
        Route::post('close/{teaket}', 'Donkovah\Teaket\Controller\TeaketController@close')
        ->name('teaket.close');
    
        Route::put('update', 'Donkovah\Teaket\Controller\TeaketController@update')
        ->name('teaket.update');

        //comments
        Route::post('comment/store/{teaket}', 'Donkovah\Teaket\Controller\CommentController@store')
        ->name('teaket.comment.store');
            
        Route::get('comment/{comment}/check', 'Donkovah\Teaket\Controller\CommentController@checkNew')
        ->name('teaket.new.comment');

    });

});