<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['user_id','foodmenu_id','quantity'];
    public function foodmenu()
    {
        return $this->belongsTo(FoodMenu::class,'foodmenu_id','id');
    }
}
