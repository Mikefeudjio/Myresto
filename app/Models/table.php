<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\tableLocation;
use App\Enums\tableStatus;
class table extends Model
{
    use HasFactory;
    protected $fillable = ['name','guest_number','status','Location'];

    protected $casts=[
        'status'=>TableStatus::class,
        'location'=>TableLocation::class,
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class); 
    }
}
