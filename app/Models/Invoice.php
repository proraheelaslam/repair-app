<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $guarded = [];


    public function job(){
        return $this->belongsTo(Job::class,'job_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('M d Y');
    }
}
