<?php

Route::group(['namespace'=>'Admin'],function () {

    Route::get('/home', function () {
        $users[] = Auth::user();
        $users[] = Auth::guard()->user();
        $users[] = Auth::guard('admin')->user();

        //dd($users);

        return view('admin.home');
    })->name('home');


    Route::get('customers/get-ajax', 'CustomerController@getAjaxCustomers');
    Route::resource('customers', 'CustomerController');
    Route::get('categories/get-ajax', 'CategoryController@getAjaxCategories');
    Route::resource('categories', 'CategoryController');
    Route::get('jobs/get-ajax', 'JobController@getAjaxJobs');
    Route::resource('jobs', 'JobController');
    Route::get('items/get-ajax/{jobId?}', 'ItemController@getAjaxItems');
    Route::resource('items', 'ItemController');

    Route::get('job/item/{jobId}', 'ItemController@getJobItem');

    Route::get('job/invoice/{jobId}', 'InvoiceController@getJobInvoice');

    Route::post('job/change_status', 'InvoiceController@changeJobStatus');


});

