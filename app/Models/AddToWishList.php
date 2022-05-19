<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddToWishList extends Model
{
    use HasFactory;

    protected $table = "add_to_wish_lists";
    protected $gaurded = [];
    protected $guarded = [];


    public function getFavList(){
        return $this->hasMany(Job::class,'id','fav_job_id');
    }


}
