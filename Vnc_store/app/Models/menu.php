<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'parent_id',
        'content',
        'active'

    ];
    function sub_Menu(){
        return $this->hasMany('App\Menu','id');

    }
    public function isChild()
    {
        # code...
        return $this->hasMany(Menu::class,'parent_id');
    }
}
