<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'content',
        'menu_id',
        'price',
        'price_sale',
        'thum',
        'active',


];
public function menu(){
    return $this->hasOne(Menu::class,'id','menu_id');
}
function sub_Menu(){
    return $this->hasMany('App\Product','id');

}
}
