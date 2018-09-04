<?php

namespace App\Models\threefourtyB;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'statesthree_id','active',
    ];
	
	/**
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function statesthree()
	{
		return $this->belongsTo('App\Models\threefourtyB\Statesthreefourty');
	}
}
