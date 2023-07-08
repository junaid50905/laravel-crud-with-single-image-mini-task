<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleImage extends Model
{
    use HasFactory;
    protected $table = 'single_images';
    protected $fillable =['title', 'image'];
}
