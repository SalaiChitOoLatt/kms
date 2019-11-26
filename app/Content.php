<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Content extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content_name', 'description', 'date', 'time',
    ];

    // The category that belong to the content.
    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
}
