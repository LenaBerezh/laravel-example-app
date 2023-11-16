<html>
    <head>
        <title>Jobber Companies</title>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="{{ route('jobs.index') }}">Jobs</a></li>
                    <li><a href="{{ route('companies.index') }}">Companies</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <a href="{{ route('companies.create') }}">Create new company</a>
            <ul>
                @foreach($companies as $company)
                    <li><a href="{{ route('companies.show', $company->id) }}">{{ $company->name }}</a></li>
                @endforeach
            </ul>
            {{ $companies->links() }}
        </section>
    </body>
</html>
