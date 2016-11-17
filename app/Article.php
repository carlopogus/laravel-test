<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

	protected $dates = ['published_at'];
    
	protected $fillable	= [
		'title',
		'body',
		'published_at',
        'user_id',
	];

	public function scopePublished($query) {
		$query->where('published_at', '<=', Carbon::now());
	}

	public function scopeUnpublished($query) {
		$query->where('published_at', '>', Carbon::now());
	}

	public function setPublishedAtAttribute($date) {
		$this->attributes['published_at'] = Carbon::parse($date);
	}

    public function setBodyAttribute($input)
    {
        $this->attributes['body'] = strip_tags($input, '<h1><h2><h3><p><span><ol><ul><li>');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tags associated with the given article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a list of tag ids associated with the current article.
     *
     * @return mixed
     */
    public function getTagListAttribute() {
        return $this->tags->lists('id')->toArray();
    }

}
