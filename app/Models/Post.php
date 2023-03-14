<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Seeders;

class Post extends Model
{
    use HasFactory,SoftDeletes;
protected $fillable=[
    'title','description','author','images',
];
protected $hidden=['id'];
}
