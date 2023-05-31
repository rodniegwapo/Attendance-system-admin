<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TimeInOut extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // public function time_in(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn () => Carbon::parse($this->time_in)->tz('Asia/Manila')->format('Y-m-d H:i:s')
    //     );
    // }
}
