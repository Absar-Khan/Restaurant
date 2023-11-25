<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodMenu extends Model
{
    use HasFactory;
    protected $fillable=['title','price','image','description'];
    public function cart()
    {
        return $this->hasMany(Cart::class,'foodmenu_id','id');
    }
}
