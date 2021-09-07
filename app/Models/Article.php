<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    protected $fillable = ['text','title', 'img']; 
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
