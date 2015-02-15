@section('content')

    @unless (count($applications))
        <p>No applications.</p>
    @else
        <ul class="list list--applications">
        @foreach ($applications as $application)
            <li class="list-item">
                <h3 class="list-title">{{{ $application->paper->title }}} {{ $application->submitted ? '<small>Submitted</small>' : '' }}</h3>
                <p class="list-description">{{{ $application->conference->name }}}</p>
            </li>
        @endforeach
        </ul>
    @endunless

@stop

@section('actions')

    {{ link_to_route('applications.create', 'New Application', null, ['class' => 'btn btn-primary']) }}

@stop
