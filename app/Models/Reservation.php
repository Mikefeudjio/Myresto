<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'tel_number',
        'email',
        'table_id',
        'rest_date',
         'guest_number'
        ];

        protected $date=[
            'rest_date'
        ];
        public function table()
        {
            return $this->belongsTo(table::class);
        }
}
