<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = ['name','phone','email','address','id_manager','logo','actived'];
    use HasFactory;

    function user(){
        return $this->belongsTo('App\Models\User');
    }
}
