<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExp extends Model
{
    use HasFactory;
    protected $table = "user_exps";
    protected $gaurded = [];
    protected $guarded = [];
}
