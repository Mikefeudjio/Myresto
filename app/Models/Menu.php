<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    
    
        public function Categories()
        {
            return $this->belongsToMany(Category::class, 'Category_Menu');
        }

}
