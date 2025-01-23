<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;



class Category extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'category_name',
     
    ];
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->hasOne(user::class , 'id','user_name');
    }
}
