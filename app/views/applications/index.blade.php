@section('content')

    @unless (count($applications))
        <p>No applications.</p>
    @else
        <ul>
        @foreach ($applications as $application)
            <li>{{ $application->paper->title }}</li>
        @endforeach
        </ul>
    @endunless

@stop

@section('actions')

    {{ link_to_route('applications.create', 'New Application', null, ['class' => 'btn btn-primary']) }}

@stop
