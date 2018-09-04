<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapdatas extends Model
{
    
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enable','name','abbreviation','textX','textY','color','hoverColor','selectedColor','url','path','text',
    ];


 }
