<?php

/*
|--------------------------------------------------------------------------
| Member Routes
|--------------------------------------------------------------------------
|
| Routes for logged in users with a linked dA account.
|
*/

Route::group(['prefix' => 'notifications', 'namespace' => 'Users'], function() {
    Route::get('/', 'AccountController@getNotifications');
    Route::get('delete/{id}', 'AccountController@getDeleteNotification');
    Route::post('clear', 'AccountController@postClearNotifications');
});

Route::group(['prefix' => 'account', 'namespace' => 'Users'], function() {
    Route::get('settings', 'AccountController@getSettings');
    Route::post('profile', 'AccountController@postProfile');
    Route::post('password', 'AccountController@postPassword');
    Route::post('email', 'AccountController@postEmail');
});

Route::group(['prefix' => 'inventory', 'namespace' => 'Users'], function() {
    Route::get('/', 'InventoryController@getIndex');
    Route::post('transfer/{id}', 'InventoryController@postTransfer');
    Route::post('delete/{id}', 'InventoryController@postDelete');

    Route::get('selector', 'InventoryController@getSelector');
});

Route::group(['prefix' => 'characters', 'namespace' => 'Users'], function() {
    Route::get('/', 'CharacterController@getIndex');
    Route::post('sort', 'CharacterController@postSortCharacters');

    Route::get('transfers/{type}', 'CharacterController@getTransfers');
    Route::post('transfer/act/{id}', 'CharacterController@postHandleTransfer');
    
    Route::get('myos', 'CharacterController@getMyos');
});

Route::group(['prefix' => 'bank', 'namespace' => 'Users'], function() {
    Route::get('/', 'BankController@getIndex');
    Route::post('transfer', 'BankController@postTransfer');
});

Route::group(['prefix' => 'submissions', 'namespace' => 'Users'], function() {
    Route::get('/', 'SubmissionController@getIndex');
    Route::get('new', 'SubmissionController@getNewSubmission');
    Route::get('new/character/{slug}', 'SubmissionController@getCharacterInfo');
    Route::get('new/prompt/{id}', 'SubmissionController@getPromptInfo');
    Route::post('new', 'SubmissionController@postNewSubmission');
});

Route::group(['prefix' => 'claims', 'namespace' => 'Users'], function() {
    Route::get('/', 'SubmissionController@getClaimsIndex');
    Route::get('new', 'SubmissionController@getNewClaim');
    Route::post('new', 'SubmissionController@postNewClaim');
});

Route::group(['prefix' => 'designs', 'namespace' => 'Characters'], function() {
    Route::get('{type?}', 'DesignController@getDesignUpdateIndex')->where('type', 'pending|approved|rejected');
    Route::get('{id}', 'DesignController@getDesignUpdate');

    Route::get('{id}/comments', 'DesignController@getComments');
    Route::post('{id}/comments', 'DesignController@postComments');

    Route::get('{id}/image', 'DesignController@getImage');
    Route::post('{id}/image', 'DesignController@postImage');

    Route::get('{id}/addons', 'DesignController@getAddons');
    Route::post('{id}/addons', 'DesignController@postAddons');

    Route::get('{id}/traits', 'DesignController@getFeatures');
    Route::post('{id}/traits', 'DesignController@postFeatures');
    
    Route::get('{id}/confirm', 'DesignController@getConfirm');
    Route::post('{id}/submit', 'DesignController@postSubmit');
    Route::post('{id}/delete', 'DesignController@postDelete');
});

Route::group(['prefix' => 'shops'], function() {
    Route::post('buy', 'ShopController@postBuy');
    Route::get('history', 'ShopController@getPurchaseHistory');
});