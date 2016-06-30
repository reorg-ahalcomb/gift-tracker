<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    /* ---------------------------- Properties --------------------------- */

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


    /* ---------------------------- Relationships --------------------------- */

    /**
     * Define relationship: one Import to many Payments 
     *
     * @return Relation
     */
    public function payments()
    {
    	return $this->hasMany('App\Models\Payment');
    }
}
