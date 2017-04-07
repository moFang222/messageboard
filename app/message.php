<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    //
    public $fillable=['username','user_id','body'];
    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
