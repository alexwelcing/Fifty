<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datas extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'states_id', 'table_rows', 'categories_title', 'active','first_heading','second_heading'
    ];


    protected static function boot() {
        parent::boot();

        static::deleting(function($patient) { // before delete() method call this
             $patient->faqs()->delete();
             // do the rest of the cleanup...
        });
    }


	/**
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function states()
	{
		return $this->belongsTo(States::class);
	}

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function faqs()
    {
        return $this->hasMany(States::class);
    }


}
