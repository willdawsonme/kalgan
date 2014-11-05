@section('content')

    {{ Form::open(['route' => 'applications.store', 'class' => 'application-form']) }}

        <h3>Paper</h3>
        {{ Form::field(['name' => 'title', 'error' => $errors]) }}
        <div class="grid">
            {{ Form::field(['name' => 'type', 'grid' => 'grid-1-2', 'type' => 'select', 'options' => ['conference' => 'Conference Paper', 'journal' => 'Journal Paper'], 'error' => $errors]) }}
            {{ Form::field(['name' => 'journal_quality', 'grid' => 'grid-1-2', 'type' => 'textarea', 'parameters' => ['rows' => 4], 'help' => 'Comment on the quality and importance of the publication.', 'error' => $errors]) }}
        </div>

        <div class="grid">
            <div class="form-group grid-1-2{{ $errors->first('accepted') ? ' has-error' : '' }}">
                {{ Form::rawLabel('accepted', 'Paper Acceptance', ['class' => 'control-label']); }}
                <div class="radio"><label>
                    {{ Form::radio('accepted', 1) }}Yes, the paper has been accepted.
                </label></div>
                <div class="radio"><label>
                    {{ Form::radio('accepted', 0) }}No, acceptance is pending.
                </label></div>
                <span class="help-block">{{ $errors->first('accepted') }}</span>
            </div>

            <div class="form-group grid-1-2{{ $errors->first('herdc_points') ? ' has-error' : '' }}">
                {{ Form::rawLabel('herdc_points', 'HERDC Points', ['class' => 'control-label']) }}
                <div class="radio"><label>
                    {{ Form::radio('herdc_points', 1) }}Yes, the paper attracts HERDC points.
                </label></div>
                <div class="radio"><label>
                    {{ Form::radio('herdc_points', 0) }}No, the paper does not attract HERDC points.
                </label></div>
                <div class="help-block">{{ $errors->first('herdc_points') ? $errors->first('herdc_points') . ' ' : '' }}Peer reviews on the full paper must have already taken place and the paper must be associated with an ISBN.</div>
            </div>
        </div>

        <h3>Conference Details</h3>
        {{ Form::field(['name' => 'name', 'error' => $errors]) }}
        {{ Form::field(['name' => 'description', 'type' => 'textarea', 'error' => $errors]) }}

        <div class="grid">
            {{ Form::field(['name' => 'url', 'grid' => 'grid-1-2', 'error' => $errors]) }}
            {{ Form::field(['name' => 'conference_start', 'grid' => 'grid-1-4', 'error' => $errors]) }}
            {{ Form::field(['name' => 'conference_end', 'grid' => 'grid-1-4', 'error' => $errors]) }}
        </div>

        <div class="grid">
            {{ Form::field(['name' => 'region', 'grid' => 'grid-1-3', 'type' => 'select',
                'options' => [1 => 'Europe, the Americas, Africa or Middle-East', 2 => 'South and East Asia', 3 => 'Australia, New Zealand or Pacific Islands'], 'error' => $errors]) }}
            {{ Form::field(['name' => 'country', 'grid' => 'grid-1-3', 'error' => $errors]) }}
            {{ Form::field(['name' => 'city', 'grid' => 'grid-1-3', 'error' => $errors]) }}
        </div>

        <div class="grid">
            {{ Form::field(['name' => 'conference_quality', 'grid' => 'grid-1-2', 'type' => 'select', 'options' => [1 => 'High', 2 => 'Medium', 3 => 'Other'], 'help' => "'A' conferences are top-tier, ‘B’ are mid-range conferences, and other can be used to indicate all other conferences.", 'error' => $errors]) }}
            <div class="form-group grid-1-2">
                {{ Form::rawLabel(null, 'Conference Duties', ['class' => 'control-label']); }}
                {{ Form::field(['name' => 'special_invitation', 'type' => 'checkbox', 'label' => 'Special invitation to conference receieved.', 'no_group' => true]) }}
                {{ Form::field(['name' => 'special_duties', 'type' => 'checkbox', 'label' => 'Will perform special duties beyond presenting a paper.', 'no_group' => true]) }}
            </div>
        </div>

        <h3>Travel Details</h3>
        <div class="grid">
            {{ Form::field(['name' => 'travel_start', 'grid' => 'grid-1-4', 'error' => $errors]) }}
            {{ Form::field(['name' => 'travel_end', 'grid' => 'grid-1-4', 'error' => $errors]) }}
        </div>
        {{ Form::field(['name' => 'travel_justification', 'type' => 'textarea', 'error' => $errors]) }}

        <h3>Funding Details</h3>
        <div class="grid">
            {{ Form::field(['name' => 'research_strength', 'grid' => 'grid-1-2', 'help' => 'You or your supervisor must be a member of the specified Research Strength.', 'error' => $errors]) }}

            <div class="form-group grid-1-2{{ $errors->first('research_strength_support') ? ' has-error' : '' }}">
                {{ Form::rawLabel('research_strength_support', 'Support Available', ['class' => 'control-label']); }}
                <div class="radio"><label>
                    {{ Form::radio('research_strength_support', 1) }}Yes, my research strength offers travel support to its members.
                </label></div>
                <div class="radio"><label>
                    {{ Form::radio('research_strength_support', 0) }}No, travel support is not available to its members.
                </label></div>
                <span class="help-block">{{ $errors->first('research_strength_support') }}</span>
            </div>
        </div>

        <div class="grid">
            {{ Form::field(['name' => 'stage', 'grid' => 'grid-1-2', 'type' => 'select', 'options' => [1 => 'Stage 1 (Pre DA)', 2 => 'Stage 2 (Post DA)', 3 => 'Stage 3 (Final/Writing Up)'], 'error' => $errors]) }}
            {{ Form::field(['name' => 'vc_conference_fund', 'grid' => 'grid-1-2', 'placeholder' => '$', 'error' => $errors]) }}
        </div>

        <div class="grid">
            {{ Form::field(['name' => 'funding_air_fares', 'class' => 'costs', 'grid' => 'grid-1-4', 'label' => 'Air Fares', 'error' => $errors]) }}
            {{ Form::field(['name' => 'funding_accommodation', 'class' => 'costs', 'grid' => 'grid-1-4', 'label' => 'Accommodation', 'error' => $errors]) }}
            {{ Form::field(['name' => 'funding_conference', 'class' => 'costs', 'grid' => 'grid-1-4', 'label' => 'Air Fares', 'label' => 'Conference Fees', 'error' => $errors]) }}
            {{ Form::field(['name' => 'funding_meals', 'class' => 'costs', 'grid' => 'grid-1-4', 'label' => 'Meals', 'error' => $errors]) }}
        </div>
        <div class="grid">
            {{ Form::field(['name' => 'funding_local_fares', 'class' => 'costs', 'grid' => 'grid-1-4', 'label' => 'Local Fares', 'error' => $errors]) }}
            {{ Form::field(['name' => 'funding_car_mileage', 'class' => 'costs', 'grid' => 'grid-1-4', 'label' => 'Car Mileage', 'error' => $errors]) }}
            {{ Form::field(['name' => 'funding_other', 'class' => 'costs', 'grid' => 'grid-1-4', 'label' => 'Other', 'error' => $errors]) }}
            <div class="form-group grid-1-4">
                <label class="control-label">Total</label>
                <div>
                <p id="totalcost" class="form-control-static">$0</p>
                </div>
            </div>
        </div>

        <h3>Other Details</h3>
        {{ Form::field(['name' => 'pep_period', 'error' => $errors]) }}

        {{ HTML::submit('Save', ['class' => 'btn btn-block btn-primary']) }}
        {{ HTML::submit('Submit', ['name' => 'submit', 'class' => 'btn btn-block btn-primary']) }}

    {{ Form::close() }}

@stop
