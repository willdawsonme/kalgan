@section('content')

    {{ Form::open(['route' => 'applications.store', 'class' => 'application-form']) }}

        <h3>Paper</h3>
        {{ Form::field(['name' => 'title']) }}
        <div class="grid">
            {{ Form::field(['name' => 'type', 'grid' => 'grid-1-2', 'type' => 'select', 'options' => ['conference' => 'Conference Paper', 'journal' => 'Journal Paper']]) }}
            {{ Form::field(['name' => 'journal_quality', 'grid' => 'grid-1-2', 'type' => 'textarea', 'parameters' => ['rows' => 4], 'help' => 'Comment on the quality and importance of the publication.']) }}
        </div>

        <div class="grid">
            <div class="form-group grid-1-2">
                {{ Form::rawLabel('accepted', 'Paper Acceptance', ['class' => 'control-label']); }}
                <div class="radio"><label>
                    {{ Form::radio('accepted', 1) }}Yes, the paper has been accepted.
                </label></div>
                <div class="radio"><label>
                    {{ Form::radio('accepted', 0) }}No, acceptance is pending.
                </label></div>
            </div>

            <div class="form-group grid-1-2">
                {{ Form::rawLabel('herdc_points', 'HERDC Points', ['class' => 'control-label']) }}
                <div class="radio"><label>
                    {{ Form::radio('herdc_points', 1) }}Yes, the paper attracts HERDC points.
                </label></div>
                <div class="radio"><label>
                    {{ Form::radio('herdc_points', 0) }}No, the paper does not attract HERDC points.
                </label></div>
                <div class="help-block">Peer reviews on the full paper must have already taken place and the paper must be associated with an ISBN.</div>
            </div>
        </div>

        <h3>Conference Details</h3>
        {{ Form::field(['name' => 'name']) }}
        {{ Form::field(['name' => 'description', 'type' => 'textarea']) }}

        <div class="grid">
            {{ Form::field(['name' => 'url', 'grid' => 'grid-1-2']) }}

            <div class="grid grid-1-2">
                {{ Form::field(['name' => 'conference_start', 'grid' => 'grid-1-2']) }}
                {{ Form::field(['name' => 'conference_end', 'grid' => 'grid-1-2']) }}
            </div>
        </div>

        <div class="grid">
            {{ Form::field(['name' => 'region', 'grid' => 'grid-1-3', 'type' => 'select',
                'options' => [1 => 'Europe, the Americas, Africa or Middle-East', 2 => 'South and East Asia', 3 => 'Australia, New Zealand or Pacific Islands']]) }}
            {{ Form::field(['name' => 'country', 'grid' => 'grid-1-3']) }}
            {{ Form::field(['name' => 'city', 'grid' => 'grid-1-3']) }}
        </div>

        <div class="grid">
            {{ Form::field(['name' => 'conference_quality', 'grid' => 'grid-1-2', 'type' => 'select', 'options' => [1 => 'High', 2 => 'Medium', 3 => 'Other'], 'help' => "'A' conferences are top-tier, ‘B’ are mid-range conferences, and other can be used to indicate all other conferences."]) }}
            <div class="form-group grid-1-2">
                {{ Form::rawLabel(null, 'Conference Duties', ['class' => 'control-label']); }}
                {{ Form::field(['name' => 'special_invitation', 'type' => 'checkbox', 'label' => 'Special invitation to conference receieved.', 'no_group' => true]) }}
                {{ Form::field(['name' => 'special_duties', 'type' => 'checkbox', 'label' => 'Will perform special duties beyond presenting a paper.', 'no_group' => true]) }}
            </div>
        </div>

        <h3>Travel Details</h3>
        <div class="grid">
            {{ Form::field(['name' => 'travel_start', 'grid' => 'grid-1-4']) }}
            {{ Form::field(['name' => 'travel_end', 'grid' => 'grid-1-4']) }}
        </div>
        {{ Form::field(['name' => 'travel_justification', 'type' => 'textarea']) }}

        <h3>Funding Details</h3>
        <div class="grid">
            {{ Form::field(['name' => 'research_strength', 'grid' => 'grid-1-2', 'help' => 'You or your supervisor must be a member of the specified Research Strength.']) }}

            <div class="form-group grid-1-2">
                {{ Form::rawLabel('research_strength_support', 'Support Available', ['class' => 'control-label']); }}
                <div class="radio"><label>
                    {{ Form::radio('research_strength_support', 1) }}Yes, my research strength offers travel support to its members.
                </label></div>
                <div class="radio"><label>
                    {{ Form::radio('research_strength_support', 0) }}No, travel support is not available to its members.
                </label></div>
            </div>
        </div>

        <div class="grid">
            {{ Form::field(['name' => 'stage', 'grid' => 'grid-1-2', 'type' => 'select', 'options' => [1 => 'Stage 1 (Pre DA)', 2 => 'Stage 2 (Post DA)', 3 => 'Stage 3 (Final/Writing Up)']]) }}
            {{ Form::field(['name' => 'vc_conference_fund', 'grid' => 'grid-1-2', 'placeholder' => '$']) }}
        </div>

        <div class="grid">
            {{ Form::field(['name' => 'funding_air_fares', 'grid' => 'grid-1-4', 'label' => 'Air Fares']) }}
            {{ Form::field(['name' => 'funding_accommodation', 'grid' => 'grid-1-4', 'label' => 'Accommodation']) }}
            {{ Form::field(['name' => 'funding_conference', 'grid' => 'grid-1-4', 'label' => 'Air Fares', 'label' => 'Conference Fees']) }}
            {{ Form::field(['name' => 'funding_meals', 'grid' => 'grid-1-4', 'label' => 'Meals']) }}
        </div>
        <div class="grid">
            {{ Form::field(['name' => 'funding_local_fares', 'grid' => 'grid-1-4', 'label' => 'Local Fares']) }}
            {{ Form::field(['name' => 'funding_car_mileage', 'grid' => 'grid-1-4', 'label' => 'Car Mileage']) }}
            {{ Form::field(['name' => 'funding_other', 'grid' => 'grid-1-4', 'label' => 'Other']) }}
            <div class="form-group grid-1-4">
                <label class="control-label">Total</label>
                <div>
                <p class="form-control-static">$0</p>
                </div>
            </div>
        </div>

        <h3>Other Details</h3>
        {{ Form::field(['name' => 'pep_period']) }}

        {{ HTML::submit('Save', ['class' => 'btn btn-block btn-primary']) }}

    {{ Form::close() }}

@stop
