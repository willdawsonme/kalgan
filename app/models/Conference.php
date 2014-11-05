<?php

class Conference extends Eloquent {

    protected $connection = 'mysql_applications';
    protected $table      = 'conferences';
    protected $dates      = ['conference_start', 'conference_end'];
    protected $fillable   = ['name', 'description', 'url', 'conference_start', 'conference_end', 'region', 'country', 'city', 'conference_quality', 'special_invitation', 'special_duties'];

    public function application()
    {
        return $this->belongsTo('Application');
    }

}
