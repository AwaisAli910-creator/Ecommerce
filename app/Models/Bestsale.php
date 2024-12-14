<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bestsale extends Model
{
    use HasFactory;
    protected $table = 'bestsale';
    protected $guarded = ['id','created_at','updated_at'];
}
