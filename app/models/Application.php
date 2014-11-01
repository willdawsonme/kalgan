<?php

class Application extends Eloquent {

    protected $table = 'applications';

    protected $fillable = ['travel_start', 'travel_end', 'travel_justification', 'research_strength', 'research_strength_support', 'stage', 'vc_conference_fund', 'funding_air_fares', 'funding_accomodation', 'funding_conference', 'funding_meals', 'funding_local_fares', 'funding_car_mileage', 'funding_other', 'pep_period'];

    /**
     * Adds this models dates to the mutator so they return Carbon instances.
     *
     * @var array
     */
    public function getDates() {
        return array_merge(parent::getDates(), array('travel_start', 'travel_end'));
    }

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
