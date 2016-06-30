<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /* ---------------------------- Properties --------------------------- */

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    	'date_of_payment' => 'date',
    	'payment_publication_date' => 'date',
    ];

    
    /* ---------------------------- Relationships --------------------------- */

    /**
     * Define relationship: one Import to many Payments 
     *
     * @return Relation
     */
    public function payments()
    {
    	return $this->belongsTo('App\Models\Import');
    }

    /* ---------------------------- Accessors -------------------------------- */

    /**
     * Format attribute as currency.
     *
     * @param  string  $value
     * @return string
     */
    public function getTotalAmountOfPaymentUsdollarsAttribute($value)
    {
    	return sprintf("$%.2f", $value);
    }

}
