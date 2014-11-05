<?php

class Application extends Eloquent {

    protected $connection = 'mysql_applications';
    protected $table      = 'applications';
    protected $with       = ['conference', 'paper'];
    protected $dates      = ['travel_start', 'travel_end'];
    protected $fillable   = ['travel_start', 'travel_end', 'travel_justification', 'research_strength', 'research_strength_support', 'stage', 'vc_conference_fund', 'funding_air_fares', 'funding_accomodation', 'funding_conference', 'funding_meals', 'funding_local_fares', 'funding_car_mileage', 'funding_other', 'pep_period'];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function conference()
    {
        return $this->hasOne('Conference');
    }

    public function paper()
    {
        return $this->hasOne('Paper');
    }

}
