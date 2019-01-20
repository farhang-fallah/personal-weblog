<?php

namespace App;
use Spatie\Sluggable\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;


class Comment extends Model
{


    protected $fillable = [
        'name',
        'email',
        'parent_id',
        'comment',
        'approved',
        'commentable_id',
        'commentable_type'
    ];



    public function setCommentAttribute($value)
    {
        $this->attributes['comment'] = str_replace(PHP_EOL , "<br>" , $value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
