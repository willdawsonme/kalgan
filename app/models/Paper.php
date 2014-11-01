<?php

class Paper extends Eloquent {

    protected $connection = 'mysql_applications';
    protected $table = 'papers';

    protected $fillable = ['title', 'type', 'journal_quality', 'accepted', 'herdc_points'];

    public function application()
    {
        return $this->belongsTo('Application');
    }

}
