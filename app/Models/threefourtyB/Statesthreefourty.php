<?php

namespace App\Models\threefourtyB;

use Illuminate\Database\Eloquent\Model;

class Statesthreefourty extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'states_id','active',
    ];
	
	/**
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function states()
	{
		return $this->belongsTo('App\Models\States');
	}

	public function statesthree()
	{
		return $this->hasMany('App\Models\threefourtyB\Sections');
	}


}
