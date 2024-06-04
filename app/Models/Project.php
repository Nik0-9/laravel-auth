<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title','image','content','slug'];
    public static function generateSlug($title)
    {
        $slug = Str::slug($title, '-');
        
        return $slug;
    }
    public static function generateTitleUnique($title)
    {
        $count = 2;
        while(Project::where('title', $title)->first()){
            $title = $title."-".$count;
            $count++;
        }
        return $title;
    }
}
