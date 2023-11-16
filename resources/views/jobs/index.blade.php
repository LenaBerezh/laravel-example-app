<html>
    <head>
        <title>Jobber</title>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="{{ route('jobs.index') }}">Jobs</a></li>
                    <li><a href="{{ route('companies.index') }}">Companies</a></li>
                </ul>
            </nav>
            <form action="/" method="GET">
                <select name="category">
                    <option value="">All categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $selectedCategory ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <select name="city">
                    <option value="">All cities</option>
                    @foreach($cities as $city)
                        <option value="{{ $city }}" {{ $city == $selectedCity ? 'selected' : '' }}>{{ $city }}</option>
                    @endforeach
                </select>
                <button type="submit">Search</button>
            </form>
        </header>
        <section>
            @foreach($jobs as $job)
                <article>
                    <h1><a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a></h1>
                    <p>Company: <a href="{{ route('companies.show', $job->company->id) }}">{{ $job->company->name }}</a></p>
                    <p>City: {{ $job->city }}</p>
                    @if ($job->salary > 0)
                        <p>Salary: {{ $job->salary }}$</p>
                    @endif
                    <div>
                        Categories:
                        @foreach($job->categories as $category)
                            <span>{{ $category->name }}</span>
                        @endforeach
                    </div>
                    <p>{{ $job->created_at->diffForHumans() }}</p>
                </article>
            @endforeach
            {{ $jobs->links() }}
        </section>
    </body>
</html>
