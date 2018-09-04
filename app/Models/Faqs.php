<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datas_id', 'categories_id', 'description', 'description2',
    ];


	/**
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function datas()
	{
		return $this->belongsTo(Datas::class);
	}

}
