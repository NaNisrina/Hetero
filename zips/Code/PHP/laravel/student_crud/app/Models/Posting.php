<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;

    //fillable fields, if no fillable then default
    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
}
