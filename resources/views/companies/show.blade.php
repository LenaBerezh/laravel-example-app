<html>
    <head>
        <title>{{ $company->name }}</title>
    </head>
    <body>
        <h1>{{ $company->name }}</h1>
        <p>{{ $company->description }}</p>
        @if (count($jobs) > 0)
            <h2>Jobs</h2>
            <a href="{{ route('jobs.create', ['company' => $company->id]) }}">Add new Job</a>
            <ul>
                @foreach ($jobs as $job)
                    <li>
                        <a href="/jobs/{{ $job->id }}">{{ $job->title }}</a>
                        <a href="{{ route('jobs.edit', ['company' => $company->id, 'job' => $job->id]) }}">Edit</a>
                        <form action="{{ route('jobs.destroy', ['company' => $company->id, 'job' => $job->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </body>
</html>
