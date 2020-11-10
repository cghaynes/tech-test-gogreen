<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;


        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
        'active'
    ];



    /**
     * Get the User that owns the feed.
     */
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
