<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $guarded = [];


    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function invoice(){
        return $this->hasOne(Invoice::class);
    }


    public static function boot(){
        parent::boot();
        static::deleting(function($items) {
            $items->items->each(function($item) {
                $item->delete();
            });
            $items->invoice()->delete();
        });
    }
}
