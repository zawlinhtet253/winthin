<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'body', 'author', 'category_id'];
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
