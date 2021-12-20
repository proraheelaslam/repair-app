<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Customer;
use App\Models\Job;
use App\Models\Item;

if (! function_exists('isActiveRoute')) {

    function isActiveRoute($route, $output = "menu-item-active")
    {
        if (Route::current()->uri == $route) return $output;
    }
}

/*if (! function_exists('isActiveRoute')) {

    function isActiveRoute($route, $output = "active")
    {
        if (Route::current()->uri == $route) return $output;
    }
}*/

if (! function_exists('setActive')) {

    function setActive($paths)
    {
        foreach ($paths as $path) {

            if(Request::is($path . '*'))
                return ' class=active';
        }
    }
}


if (! function_exists('checkImage')) {

    function checkImage($path)
    {
        if (\File::exists(public_path('uploads/'.$path))){
           return asset('public/uploads/'.$path);
        }else{
            $path = explode('/',$path);

            $place_holder = 'placeholder.png';
            if(count($path) > 0){
                $placeholder = $path[0];
                switch ($placeholder) {
                  case 'company_images':
                      $place_holder = 'companyImage_placeholder.png';
                    break;
                  case 'company_logo':
                      $place_holder = 'companyLogo_placeholder.png';
                    break;


                }
            }
            return asset('public/uploads/'.$place_holder);
        }
    }
}

if (! function_exists('getAllCustomers')) {

    function getAllCustomers()
    {
        return Customer::get();
    }
}

if (! function_exists('getAllCustomerNames')) {

    function getAllCustomerNames()
    {
        return Customer::get()->pluck('name','id');
    }
}

if (! function_exists('getAllJobNames')) {

    function getAllJobNames()
    {
        return Job::get()->pluck('title','id');
    }
}

if (! function_exists('getItemsByJob')) {

    function getItemsByJob($jobId)
    {
        return Job::with('items','invoice')->where('id', $jobId)->first();
    }
}

if (! function_exists('getJobNumber')) {

    function getJobNumber()
    {
        return mt_rand(1000,9999);
    }
}


if (! function_exists('generateInoviceNumber')) {

    function generateInoviceNumber()
    {
        return mt_rand(100000,999999);
    }
}


if (! function_exists('geItemPrice')) {

    function geItemPrice($qty,$price)
    {

        $itemPrice = $qty * $price;
        $totalPrice  = $itemPrice;
        return $totalPrice;
    }
}

if (! function_exists('totalCustomers')) {

    function totalCustomers()
    {
        return Customer::count();
    }
}
if (! function_exists('totalItems')) {

    function totalItems()
    {
        return Item::count();
    }
}






