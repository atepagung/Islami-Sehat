<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QA extends Model
{
    protected $table = 'qa';

    protected $fillable = [
    	'user_id', 'question', 'answer', 'ditujukan'
    ];

    public function penanya()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
