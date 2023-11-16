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
            <form action="{{ route('companies.store') }}" method="POST">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea name="description" id="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit">Create</button>
        </section>
    </body>
</html>
