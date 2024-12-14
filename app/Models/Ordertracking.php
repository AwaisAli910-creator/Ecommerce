<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordertracking extends Model
{
    use HasFactory;

    protected $table = 'ordertracking';
    protected $guarded = ['id','created_at','updated_at'];
}
