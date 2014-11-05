<?php namespace Kalgan\Forms;

class ApplicationForm extends FormValidator {

    /**
     * Validation rules for the sign in form.
     *
     * @var array
     */
    protected $rules = [
        /* Application */
        'travel_start'              => 'required|date_format:"Y-m-d H:i:s"',
        'travel_end'                => 'required|date_format:"Y-m-d H:i:s"|not_before:travel_start',
        'travel_justification'      => 'required',
        'research_strength'         => '',
        'research_strength_support' => 'boolean|required_with:research_strength',
        'stage'                     => 'required',
        'vc_conference_fund'        => 'numeric',
        'funding_air_fares'         => 'numeric',
        'funding_accomodation'      => 'numeric',
        'funding_conference'        => 'numeric',
        'funding_meals'             => 'numeric',
        'funding_local_fares'       => 'numeric',
        'funding_car_mileage'       => 'numeric',
        'funding_other'             => 'numeric',
        'pep_period'                => '',

        /* Conference */
        'name'                      => 'required',
        'description'               => 'required',
        'url'                       => 'url',
        'conference_start'          => 'required|date_format:"Y-m-d H:i:s"',
        'conference_end'            => 'required|date_format:"Y-m-d H:i:s"|not_before:conference_start',
        'region'                    => 'required',
        'country'                   => 'required',
        'city'                      => 'required',
        'conference_quality'        => 'required',
        'special_invitation'        => 'boolean',
        'special_duties'            => 'boolean',

        /* Paper */
        'title'                     => 'required',
        'type'                      => 'required',
        'journal_quality'           => 'required_if:type,journal',
        'accepted'                  => 'required|boolean',
        'herdc_points'              => 'required|boolean',
    ];

    protected $messages = [
    ];

}
