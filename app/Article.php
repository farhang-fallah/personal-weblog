<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'title' , 'body', 'images',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class , 'article_id');
    }

//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'user_id', 'id', 'updated_at', 'commentCount' , 'body' , 'title' , 'images' , 'description' , 'viewCount' , 'created_at' , 'updated_at' , 'slug'
//    ];

    protected $casts = ['images' => 'array'];

    public function scopeSearch ($query , $keywords)
    {
        $query->where('title', 'like' , '%' . $keywords . '%');
        return $query;
    }

    public function scopeFilter($query , $filters)
    {
        if (isset($filters['month']) && $month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if (isset($filters['year']) && $year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['description'] = str_limit(preg_replace('/<[^>]*>/' , '' , $value) , 400);
        $this->attributes['body'] = $value;
    }

    public function path (){
        return "/article/$this->slug";
    }

}
