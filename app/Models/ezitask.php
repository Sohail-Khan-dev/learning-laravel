<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ezitask extends Model
{
    use HasFactory;
    protected $table = 'ezitask';
    protected $fillable = ['Title','Description','Status'];

    protected $casts = [
        'status' => TaskStatusEnum::class 
    ] ;
}
