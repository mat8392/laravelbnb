<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookable extends Model
{
    // table name is auto in laravel Bookable = bookables
    // can custome define  protected $table = 'bookable';
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * [availableFor description]
     * @param  [type] $from [description]
     * @param  [type] $to   [description]
     * @return [type]       [description]
     */
    public function availableFor($from, $to): bool //this : bool show always return type bool
    {
        return 0 === $this->bookings()->betweenDates($from, $to)->count();
    }
}
