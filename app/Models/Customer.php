<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $guarded = [];


    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public static function boot(){
        parent::boot();
        static::deleting(function($customer) {
            $customer->jobs->each(function($job) {
                $job->delete();
            });
        });
    }
}
