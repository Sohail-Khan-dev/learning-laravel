<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs'; // Assign Table to the Model
    protected $fillable = ['name','desc','email'];



}
