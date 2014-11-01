<?php

class Conference extends Eloquent {

    protected $table = 'conferences';

    protected $fillable = ['name', 'description', 'url', 'conference_start', 'conference_end', 'region', 'country', 'city', 'conference_quality', 'special_invitation', 'special_duties'];

    /**
     * Adds this models dates to the mutator so they return Carbon instances.
     *
     * @var array
     */
    public function getDates() {
        return array_merge(parent::getDates(), array('conference_start', 'conference_end'));
    }

    public function application()
    {
        return $this->belongsTo('Application');
    }

}
