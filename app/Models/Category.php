<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['genre'];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}