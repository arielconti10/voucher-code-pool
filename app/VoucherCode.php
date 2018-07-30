<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Faker\Generator as Faker;


class VoucherCode extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'recipient_id', 'special_offer_id', 'expiration_date', 'usage_date'
    ];


    public function specialOffer()
    {
        return $this->belongsTo('App\SpecialOffer');
    }

    public function recipient()
    {
        return $this->belongsTo('App\Recipient');
    }

    public function generateRandomCode()
    {
        //TODO: GENERATE RANDOM CODE
        $faker = new Faker;
        dd($faker);
        return $this->code = 'CODE'.rand(1, 1000);
    }

}
