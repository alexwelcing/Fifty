<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question','active',
    ];
	
	/**
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*
	public function states()
	{
		return $this->belongsTo(States::class);
	}*/
}
