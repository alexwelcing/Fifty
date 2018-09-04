<?php

namespace App\Models\threefourtyB;

use Illuminate\Database\Eloquent\Model;

class Sectiondatas extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'ingredient_cost', 'dispensing_fee', 'clarifying_detail', 'source','source_link','question_type','table_select','active','sections_id','users_id','questions_id'
    ];
	
	/**
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function sections()
	{
		return $this->belongsTo('App\Models\threefourtyB\Sections');
	}

	public function statesthree()
	{
		return $this->belongsTo('App\Models\threefourtyB\Statesthreefourty');
	}

	public function questions()
	{
		return $this->belongsTo('App\Models\Questions');
	}
}
