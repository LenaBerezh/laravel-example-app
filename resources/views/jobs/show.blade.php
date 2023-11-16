<html>
    <head>
        <title>{{ $job->title }} at {{ $job->company->name }}</title>
    </head>
    <body>
        <h1>{{ $job->title }}</h1>
        <p>Company: <a href="{{ route('companies.show', $job->company->id) }}">{{ $job->company->name }}</a></p>
        <p>City: {{ $job->city }}</p>
        @if ($job->salary > 0)
            <p>Salary: {{ $job->salary }}$</p>
        @endif
        <p>{{ $job->description }}</p>
        <div>
            Categories:
            @foreach($job->categories as $category)
                <span>{{ $category->name }}</span>
            @endforeach
        </div>
        <p>{{ $job->created_at->diffForHumans() }}</p>
    </body>
</html>
